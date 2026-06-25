<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use App\Models\PindahNama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('login');
    }

    /**
     * Process login request.
     */
    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('status', 'Login berhasil!');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Email atau password tidak sesuai.',
            ]);
    }

    /**
     * Show the register form.
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('register');
    }

    /**
     * Process register request.
     */
    public function processRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required', 'accepted'],
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'terms.required' => 'Anda harus menyetujui syarat dan ketentuan',
            'terms.accepted' => 'Anda harus menyetujui syarat dan ketentuan',
        ]);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            Auth::login($user);
            $request->session()->regenerate();

            try {
                Mail::to($user->email)->send(new WelcomeMail($user->name));
            } catch (\Exception $e) {
                // Mail not configured, skip
            }

            return redirect('/dashboard')->with('status', 'Akun berhasil dibuat! Selamat datang di SAMSAT DIY');
        } catch (\Exception $e) {
            return back()
                ->withInput($request->only('name', 'email', 'phone'))
                ->withErrors(['error' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.']);
        }
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status', 'Logout berhasil');
    }

    public function profile()
    {
        return view('user_profile', ['user' => auth()->user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'nullable|required_with:new_password|current_password',
            'new_password' => 'nullable|string|min:8|confirmed',
        ], [
            'current_password.required_with' => 'Password saat ini harus diisi jika ingin ganti password',
            'current_password.current_password' => 'Password saat ini tidak sesuai',
            'new_password.confirmed' => 'Konfirmasi password baru tidak sesuai',
            'new_password.min' => 'Password minimal 8 karakter',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['new_password'])) {
            $user->password = Hash::make($validated['new_password']);
        }

        $user->save();

        return redirect('/dashboard')->with('status', 'Profil berhasil diperbarui!');
    }

    /**
     * Show dashboard (only for logged in users).
     */
    public function dashboard()
    {
        $user = auth()->user();
        $vehicles = \App\Models\Kendaraan::where('user_id', $user->id)->get();
        $transfers = \App\Models\PindahNama::where('user_id', $user->id)
            ->orWhere('email_pemilik_baru', $user->email)
            ->orderBy('created_at', 'desc')->take(5)->get();
        return view('dashboard', compact('user', 'vehicles', 'transfers'));
    }

    /**
     * Show forgot password form.
     */
    public function showForgotPassword()
    {
        return view('forgot_password');
    }

    /**
     * Process forgot password request.
     */
    public function processForgotPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.exists' => 'Email tidak terdaftar di sistem',
        ]);

        $user = User::where('email', $validated['email'])->first();
        
        if ($user) {
            // Generate reset token
            $token = \Illuminate\Support\Str::random(60);
            
            // Store token in session temporarily (simple approach)
            // For production, use database table to store reset tokens
            session(['reset_token_' . $user->id => $token, 'reset_email' => $validated['email']]);
            
            try {
                // Send reset email
                Mail::to($user->email)->send(new \App\Mail\PasswordResetMail($user->name, $token, $user->id));
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['error' => 'Gagal mengirim email. Silakan coba lagi nanti.']);
            }
        }

        // Always show success message for security (don't reveal if email exists)
        return redirect('/login')->with('status', 'Link reset password telah dikirim ke email Anda. Silakan cek email Anda.');
    }

    /**
     * Show reset password form.
     */
    public function showResetPassword($token)
    {
        $userId = request()->query('user');
        if (!$userId || !session()->has('reset_token_' . $userId) || session('reset_token_' . $userId) !== $token) {
            return redirect('/login')->withErrors(['error' => 'Link reset password tidak valid atau telah kadaluarsa.']);
        }
        return view('reset_password', ['token' => $token, 'userId' => $userId]);
    }

    /**
     * Process reset password request.
     */
    public function processResetPassword(Request $request)
    {
        $validated = $request->validate([
            'token' => ['required', 'string'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'user_id.exists' => 'Akun pengguna tidak ditemukan',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        if (!session()->has('reset_token_' . $validated['user_id']) || 
            session('reset_token_' . $validated['user_id']) !== $validated['token']) {
            return back()->withErrors(['error' => 'Link reset password tidak valid atau telah kadaluarsa.']);
        }

        $user = User::findOrFail($validated['user_id']);
        $user->password = Hash::make($validated['password']);
        $user->save();

        session()->forget('reset_token_' . $validated['user_id']);
        session()->forget('reset_email');

        return redirect('/login')->with('status', 'Password berhasil direset! Silakan login dengan password baru Anda.');
    }
}
