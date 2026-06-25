<?php

namespace App\Http\Controllers;

use App\Mail\PaymentInvoice;
use App\Mail\PaymentAdminNotification;
use App\Models\Kendaraan;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Snap;

class PajakController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function showForm()
    {
        return view('bayarpajak');
    }

    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'nopol' => 'required|string|max:15',
            'nik' => 'required|string|max:20',
            'norangka' => 'required|string|max:10',
            'email' => 'required|string|email',
        ], [
            'nopol.required' => 'Nomor polisi harus diisi',
            'nik.required' => 'NIK harus diisi',
            'norangka.required' => '5 digit terakhir nomor rangka harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
        ]);

        $nopol = strtoupper(trim($validated['nopol']));
        $nik = trim($validated['nik']);
        $norangka = strtoupper(trim($validated['norangka']));

        $vehicle = Kendaraan::where('no_polisi', $nopol)
            ->where('NIK', $nik)
            ->first();

        if (!$vehicle) {
            return back()
                ->withInput()
                ->withErrors(['nopol' => 'Data kendaraan tidak ditemukan. Periksa nomor polisi dan NIK Anda.']);
        }

        $lastDigits = strtoupper(substr($vehicle->no_rangka, -5));
        if ($lastDigits !== $norangka) {
            return back()
                ->withInput()
                ->withErrors(['norangka' => '5 digit terakhir nomor rangka tidak sesuai dengan data kendaraan.']);
        }

        // Calculate payment amount based on vehicle price
        $nominal = Payment::getPrice($vehicle->harga ?? 0);

        // Create payment record
        try {
            $transactionId = 'PAY-' . $vehicle->id . '-' . time();
            
            $payment = Payment::create([
                'kendaraan_id' => $vehicle->id,
                'no_polisi' => $vehicle->no_polisi,
                'email' => $validated['email'],
                'nominal' => $nominal,
                'midtrans_transaction_id' => $transactionId,
                'status' => 'pending',
                'valid_until' => now()->addYear(),
            ]);

            // Prepare Midtrans transaction
            $params = [
                'transaction_details' => [
                    'order_id' => $transactionId,
                    'gross_amount' => $nominal,
                ],
                'customer_details' => [
                    'first_name' => $vehicle->nama_pemilik,
                    'email' => $validated['email'],
                ],
                'item_details' => [
                    [
                        'id' => $vehicle->no_polisi,
                        'price' => $nominal,
                        'quantity' => 1,
                        'name' => 'Pajak Kendaraan - ' . $vehicle->no_polisi,
                    ]
                ]
            ];

            $snapToken = Snap::getSnapToken($params);

            return view('bayarpajak', [
                'vehicle' => $vehicle,
                'payment' => $payment,
                'snapToken' => $snapToken,
                'nominal' => $nominal,
            ]);

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Gagal membuat transaksi: ' . $e->getMessage()]);
        }
    }

    public function handleCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed != $request->signature_key) {
            return response()->json(['status' => 'error'], 403);
        }

        $payment = Payment::where('midtrans_transaction_id', $request->order_id)->first();

        if (!$payment) {
            return response()->json(['status' => 'error', 'message' => 'Payment not found'], 404);
        }

        if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
            $payment->update([
                'status' => 'completed',
                'paid_at' => now(),
                'midtrans_response' => json_encode($request->all()),
            ]);

            // Send invoice to user
            try {
                $vehicle = $payment->kendaraan;
                Mail::to($payment->email)->send(new PaymentInvoice($payment, $vehicle));
            } catch (\Exception $e) {}

            // Send notification to admin
            try {
                $adminEmail = config('app.admin_email', 'demosamsat@gmail.com');
                Mail::to($adminEmail)->send(new PaymentAdminNotification($payment));
            } catch (\Exception $e) {}

        } elseif ($request->transaction_status == 'deny' || $request->transaction_status == 'expire') {
            $payment->update([
                'status' => 'failed',
                'midtrans_response' => json_encode($request->all()),
            ]);
        }

        return response()->json(['status' => 'ok']);
    }
}
