<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Kendaraan;
use App\Models\User;
use App\Models\PindahNama;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    /**
     * Show admin login form
     */
    public function showAdminLogin()
    {
        return view('admin_login');
    }

    /**
     * Process admin login
     */
    public function processAdminLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $admin = Admin::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Session::put('admin', $admin);
            Session::put('admin_id', $admin->id);
            return redirect('/admin/dashboard')->with('success', 'Login admin berhasil!');
        }

        return back()
            ->withInput($request->only('username'))
            ->withErrors(['username' => 'Username atau password tidak sesuai.']);
    }

    /**
     * Show admin dashboard
     */
    public function dashboard()
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
        $vehicles = Kendaraan::all();
        $users = User::all();
        $transfers = PindahNama::all();
        
        return view('admin_dashboard', compact('vehicles', 'users', 'transfers'));
    }

    /**
     * Logout admin
     */
    public function logout()
    {
        Session::forget('admin');
        Session::forget('admin_id');
        return redirect('/')->with('status', 'Logout admin berhasil');
    }

    // CRUD Stub Methods for Routes
    public function listVehicles(Request $request)
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
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

        $vehicles = $query->paginate(20)->withQueryString();
        return view('admin_vehicles_list', compact('vehicles'));
    }
    public function createVehicle()
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
        $users = User::all();
        return view('admin_vehicle_create', compact('users'));
    }
    public function editVehicle($id)
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
        $vehicle = Kendaraan::findOrFail($id);
        $users = User::all();
        return view('admin_vehicle_edit', compact('vehicle', 'users'));
    }
    public function updateVehicle(Request $request, $id)
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'no_polisi' => 'required|string|max:15',
            'nama_pemilik' => 'required|string',
            'NIK' => 'required|string',
            'merk' => 'required|string',
            'tipe' => 'required|string',
            'jenis' => 'required|in:SIM-A,SIM-B1,SIM-B2,SIM-C,SIM-C1,SIM-C2',
            'tahun_pembuatan' => 'required|integer|min:1900|max:2100',
            'warna' => 'required|string',
            'no_rangka' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'no_mesin' => 'required|string',
        ]);
        
        $vehicle = Kendaraan::findOrFail($id);
        $old = $vehicle->getOriginal();
        $vehicle->update($validated);
        ActivityLog::log('updated vehicle', $vehicle, $old, $vehicle->toArray());
        
        return redirect('/admin/dashboard')->with('success', 'Kendaraan berhasil diupdate!');
    }

    public function storeVehicle(Request $request)
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
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
        ActivityLog::log('created vehicle', $vehicle);
        
        return redirect('/admin/dashboard')->with('success', 'Kendaraan berhasil ditambahkan!');
    }
    
    public function deleteVehicle($id)
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
        $vehicle = Kendaraan::withTrashed()->findOrFail($id);
        $vehicle->delete();
        ActivityLog::log('deleted vehicle', $vehicle);
        
        return redirect('/admin/dashboard')->with('success', 'Kendaraan berhasil dihapus!');
    }
    public function listUsers(Request $request)
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->paginate(20)->withQueryString();
        return view('admin_users_list', compact('users'));
    }
    
    public function createUser()
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
        return view('admin_user_create');
    }
    
    public function storeUser(Request $request)
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        ActivityLog::log('created user', $user);
        
        return redirect('/admin/dashboard')->with('success', 'User berhasil ditambahkan!');
    }
    
    public function editUser($id)
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
        $user = User::findOrFail($id);
        return view('admin_user_edit', compact('user'));
    }
    
    public function updateUser(Request $request, $id)
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);
        
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        
        $old = $user->getOriginal();
        $user->update($validated);
        ActivityLog::log('updated user', $user, $old, $user->toArray());
        
        return redirect('/admin/dashboard')->with('success', 'User berhasil diupdate!');
    }
    
    public function deleteUser($id)
    {
        if (!Session::has('admin')) {
            return redirect('/admin/login');
        }
        
        $user = User::withTrashed()->findOrFail($id);
        $user->delete();
        ActivityLog::log('deleted user', $user);
        
        return redirect('/admin/dashboard')->with('success', 'User berhasil dihapus!');
    }
}
