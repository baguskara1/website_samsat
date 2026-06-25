<?php

namespace App\Http\Controllers;

use App\Mail\PindahNamaStatus;
use App\Mail\TransferStatusNotification;
use App\Models\PindahNama;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PindahNamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pindahNamas = PindahNama::with('kendaraan')->latest()->get();
        return view('pindah_nama_list', compact('pindahNamas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kendaraans = Kendaraan::all();
        return view('pindah_nama', compact('kendaraans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'nama_pemilik_lama' => 'required|string|max:255',
            'nik_pemilik_lama' => 'required|string|max:20',
            'nama_pemilik_baru' => 'required|string|max:255',
            'nik_pemilik_baru' => 'required|string|max:20',
            'alamat_pemilik_baru' => 'required|string',
            'no_telepon_pemilik_baru' => 'required|string|max:20',
            'email_pemilik_baru' => 'nullable|email|max:255',
            'alasan_pindah_nama' => 'required|string',
            'dokumen_ktp_lama' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'dokumen_ktp_baru' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'dokumen_bpkb' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'dokumen_stnk' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'dokumen_kwitansi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('dokumen_ktp_lama')) {
            $validated['dokumen_ktp_lama'] = $request->file('dokumen_ktp_lama')->store('pindah_nama/ktp_lama', 'public');
        }
        if ($request->hasFile('dokumen_ktp_baru')) {
            $validated['dokumen_ktp_baru'] = $request->file('dokumen_ktp_baru')->store('pindah_nama/ktp_baru', 'public');
        }
        if ($request->hasFile('dokumen_bpkb')) {
            $validated['dokumen_bpkb'] = $request->file('dokumen_bpkb')->store('pindah_nama/bpkb', 'public');
        }
        if ($request->hasFile('dokumen_stnk')) {
            $validated['dokumen_stnk'] = $request->file('dokumen_stnk')->store('pindah_nama/stnk', 'public');
        }
        if ($request->hasFile('dokumen_kwitansi')) {
            $validated['dokumen_kwitansi'] = $request->file('dokumen_kwitansi')->store('pindah_nama/kwitansi', 'public');
        }

        $validated['tanggal_pengajuan'] = now();
        $validated['status'] = 'pending';
        $validated['user_id'] = auth()->id();

        PindahNama::create($validated);

        return redirect()->route('pindah_nama.index')->with('success', 'Pengajuan pindah nama berhasil diajukan!');
    }

    /**
     * Show the transfer request details.
     */
    public function show($id)
    {
        $pindahNama = PindahNama::with('kendaraan')->findOrFail($id);
        return view('pindah_nama_detail', compact('pindahNama'));
    }

    /**
     * Complete the transfer and update vehicle owner name in database.
     */
    public function complete($id)
    {
        try {
            $pindahNama = PindahNama::findOrFail($id);

            // Update vehicle owner information
            $kendaraan = Kendaraan::findOrFail($pindahNama->kendaraan_id);
            $kendaraan->update([
                'nama_pemilik' => $pindahNama->nama_pemilik_baru,
                'NIK' => $pindahNama->nik_pemilik_baru,
            ]);

            // Update transfer status and completion date
            $pindahNama->update([
                'status' => 'selesai',
                'tanggal_selesai' => now(),
                'admin_id' => Session::get('admin_id'),
            ]);

            return redirect()->route('pindah_nama.index')->with('success', 'Pindah nama berhasil diselesaikan! Data kendaraan telah diperbarui.');

            try {
                if ($pindahNama->email_pemilik_baru) {
                    Mail::to($pindahNama->email_pemilik_baru)->send(new PindahNamaStatus($pindahNama, 'selesai'));
                }
            } catch (\Exception $e) {}

            // Send admin notification
            try {
                $admin_email = session("admin") ? session("admin")->email : config("app.admin_email", "admin@samsat.local");
                Mail::to($admin_email)->send(new TransferStatusNotification(
                    $pindahNama->no_polisi,
                    $pindahNama->nama_pemilik_lama,
                    $pindahNama->nama_pemilik_baru,
                    "completed",
                    $admin_email
                ));
            } catch (Exception $e) {}
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyelesaikan pindah nama: ' . $e->getMessage());
        }
    }

    /**
     * Reject the transfer request.
     */
    public function reject($id)
    {
        try {
            $pindahNama = PindahNama::findOrFail($id);
            $pindahNama->update([
                'status' => 'ditolak',
                'catatan_admin' => 'Permohonan ditolak.',
                'admin_id' => Session::get('admin_id'),
            ]);

            return redirect()->route('pindah_nama.index')->with('success', 'Permohonan pindah nama telah ditolak.');

            try {
                if ($pindahNama->email_pemilik_baru) {

            // Send admin notification
            try {
                $admin_email = session("admin") ? session("admin")->email : config("app.admin_email", "admin@samsat.local");
                Mail::to($admin_email)->send(new TransferStatusNotification(
                    $pindahNama->no_polisi,
                    $pindahNama->nama_pemilik_lama,
                    $pindahNama->nama_pemilik_baru,
                    "rejected",
                    $admin_email
                ));
            } catch (Exception $e) {}
                    Mail::to($pindahNama->email_pemilik_baru)->send(new PindahNamaStatus($pindahNama, 'ditolak'));
                }
            } catch (\Exception $e) {}
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menolak permohonan: ' . $e->getMessage());
        }
    }
}
