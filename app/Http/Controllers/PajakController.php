<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PajakController extends Controller
{
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

        $vehicle = Kendaraan::where('no_polisi', $validated['nopol'])
            ->where('NIK', $validated['nik'])
            ->first();

        if (!$vehicle) {
            return back()
                ->withInput()
                ->withErrors(['nopol' => 'Data kendaraan tidak ditemukan. Periksa nomor polisi dan NIK Anda.']);
        }

        $lastDigits = substr($vehicle->no_rangka, -5);
        if ($lastDigits !== $validated['norangka']) {
            return back()
                ->withInput()
                ->withErrors(['norangka' => '5 digit terakhir nomor rangka tidak sesuai dengan data kendaraan.']);
        }

        return back()->with('success', '
            <strong>✓ Pembayaran Berhasil Diproses!</strong><br><br>
            Detail Pembayaran:<br>
            • Nomor Polisi: ' . $vehicle->no_polisi . '<br>
            • Nama Pemilik: ' . $vehicle->nama_pemilik . '<br>
            • Merk/Tipe: ' . $vehicle->merk . ' / ' . $vehicle->tipe . '<br>
            • Tahun: ' . $vehicle->tahun_pembuatan . '<br>
            • Email Bukti: ' . $validated['email'] . '<br><br>
            <em>Bukti pembayaran akan dikirim ke email Anda dalam waktu 1x24 jam.</em>
        ');
    }
}
