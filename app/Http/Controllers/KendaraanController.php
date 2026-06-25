<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kendaraan::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('no_polisi', 'like', "%{$search}%")
                  ->orWhere('nama_pemilik', 'like', "%{$search}%")
                  ->orWhere('merk', 'like', "%{$search}%")
                  ->orWhere('NIK', 'like', "%{$search}%");
            });
        }

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('tahun')) {
            $query->where('tahun_pembuatan', $request->tahun);
        }

        $kendaraans = $query->paginate(20)->withQueryString();
        return view('Daftar_kendaraan', compact('kendaraans'));
    }

    public function create()
    {
        $users = User::all();
        return view('kendaraan_create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'no_polisi' => 'required|string|max:15|unique:kendaraans,no_polisi',
            'nama_pemilik' => 'required|string',
            'NIK' => 'required|string|unique:kendaraans,NIK',
            'merk' => 'required|string',
            'tipe' => 'required|string',
            'jenis' => 'required|in:SIM-A,SIM-B1,SIM-B2,SIM-C,SIM-C1,SIM-C2',
            'tahun_pembuatan' => 'required|integer|min:1900|max:2100',
            'warna' => 'required|string',
            'no_rangka' => 'required|string|unique:kendaraans,no_rangka',
            'harga' => 'required|numeric|min:0',
            'no_mesin' => 'required|string|unique:kendaraans,no_mesin',
        ]);

        $vehicle = Kendaraan::create($validated);
        ActivityLog::log('created', $vehicle);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Kendaraan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $kendaraan = Kendaraan::with('pindahNamas')->findOrFail($id);
        return view('kendaraan_show', compact('kendaraan'));
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $users = User::all();
        return view('kendaraan_edit', compact('kendaraan', 'users'));
    }

    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'no_polisi' => 'required|string|max:15|unique:kendaraans,no_polisi,' . $id,
            'nama_pemilik' => 'required|string',
            'NIK' => 'required|string|unique:kendaraans,NIK,' . $id,
            'merk' => 'required|string',
            'tipe' => 'required|string',
            'jenis' => 'required|in:SIM-A,SIM-B1,SIM-B2,SIM-C,SIM-C1,SIM-C2',
            'tahun_pembuatan' => 'required|integer|min:1900|max:2100',
            'warna' => 'required|string',
            'no_rangka' => 'required|string|unique:kendaraans,no_rangka,' . $id,
            'harga' => 'required|numeric|min:0',
            'no_mesin' => 'required|string|unique:kendaraans,no_mesin,' . $id,
        ]);

        $old = $kendaraan->getOriginal();
        $kendaraan->update($validated);
        ActivityLog::log('updated', $kendaraan, $old, $kendaraan->toArray());

        return redirect()->route('kendaraan.index')
            ->with('success', 'Kendaraan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();
        ActivityLog::log('deleted', $kendaraan);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus!');
    }
}
