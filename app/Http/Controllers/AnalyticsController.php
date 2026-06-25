<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\User;
use App\Models\PindahNama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Show analytics dashboard - Admin only
     */
    public function dashboard()
    {
        if (!session()->has('admin')) {
            return redirect('/admin/login');
        }

        $stats = [
            'total_users' => User::count(),
            'total_vehicles' => Kendaraan::count(),
            'total_transfers' => PindahNama::count(),
            'pending_transfers' => PindahNama::where('status', 'pending')->count(),
            'completed_transfers' => PindahNama::where('status', 'completed')->count(),
        ];

        $vehicle_types = Kendaraan::select('jenis', DB::raw('count(*) as count'))
            ->groupBy('jenis')
            ->get();

        $recent_registrations = User::orderBy('created_at', 'desc')->take(10)->get();
        
        $recent_vehicles = Kendaraan::orderBy('created_at', 'desc')->take(10)->get();

        return view('admin_analytics', compact('stats', 'vehicle_types', 'recent_registrations', 'recent_vehicles'));
    }

    /**
     * Show vehicle analytics
     */
    public function vehicles()
    {
        if (!session()->has('admin')) {
            return redirect('/admin/login');
        }

        $total = Kendaraan::count();
        $by_type = Kendaraan::select('jenis', DB::raw('count(*) as count'))
            ->groupBy('jenis')
            ->get();
        
        $by_year = Kendaraan::select('tahun_pembuatan', DB::raw('count(*) as count'))
            ->groupBy('tahun_pembuatan')
            ->orderBy('tahun_pembuatan', 'desc')
            ->take(10)
            ->get();

        return view('analytics_vehicles', compact('total', 'by_type', 'by_year'));
    }

    /**
     * Show user analytics
     */
    public function users()
    {
        if (!session()->has('admin')) {
            return redirect('/admin/login');
        }

        $total = User::count();
        $active = User::where('created_at', '>=', now()->subMonths(1))->count();
        $registrations_by_month = User::select(
            DB::raw('DATE_TRUNC(\'month\', created_at) as month'),
            DB::raw('count(*) as count')
        )
        ->groupBy(DB::raw('DATE_TRUNC(\'month\', created_at)'))
        ->orderBy('month', 'desc')
        ->take(12)
        ->get();

        return view('analytics_users', compact('total', 'active', 'registrations_by_month'));
    }

    /**
     * Show transfer analytics
     */
    public function transfers()
    {
        if (!session()->has('admin')) {
            return redirect('/admin/login');
        }

        $total = PindahNama::count();
        $by_status = PindahNama::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        $recent = PindahNama::orderBy('created_at', 'desc')->take(20)->get();

        return view('analytics_transfers', compact('total', 'by_status', 'recent'));
    }

    /**
     * Export analytics to CSV
     */
    public function export(Request $request)
    {
        if (!session()->has('admin')) {
            return redirect('/admin/login');
        }

        $type = $request->get('type', 'vehicles');
        
        if ($type === 'vehicles') {
            return $this->exportVehicles();
        } elseif ($type === 'users') {
            return $this->exportUsers();
        } elseif ($type === 'transfers') {
            return $this->exportTransfers();
        }

        return back()->withErrors(['error' => 'Tipe laporan tidak valid']);
    }

    private function exportVehicles()
    {
        $vehicles = Kendaraan::all();
        $filename = 'vehicles_' . now()->format('Y-m-d_His') . '.csv';
        
        $handle = fopen('php://memory', 'r+');
        fputcsv($handle, ['No Polisi', 'Nama Pemilik', 'Merk', 'Jenis', 'Tahun', 'NIK']);
        
        foreach ($vehicles as $vehicle) {
            fputcsv($handle, [
                $vehicle->no_polisi,
                $vehicle->nama_pemilik,
                $vehicle->merk,
                $vehicle->jenis,
                $vehicle->tahun_pembuatan,
                $vehicle->NIK,
            ]);
        }
        
        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);
        
        return response($content, 200, [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }

    private function exportUsers()
    {
        $users = User::all();
        $filename = 'users_' . now()->format('Y-m-d_His') . '.csv';
        
        $handle = fopen('php://memory', 'r+');
        fputcsv($handle, ['Nama', 'Email', 'Tanggal Daftar']);
        
        foreach ($users as $user) {
            fputcsv($handle, [
                $user->name,
                $user->email,
                $user->created_at->format('Y-m-d H:i:s'),
            ]);
        }
        
        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);
        
        return response($content, 200, [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }

    private function exportTransfers()
    {
        $transfers = PindahNama::all();
        $filename = 'transfers_' . now()->format('Y-m-d_His') . '.csv';
        
        $handle = fopen('php://memory', 'r+');
        fputcsv($handle, ['No Polisi', 'Pemilik Lama', 'Pemilik Baru', 'Status', 'Tanggal']);
        
        foreach ($transfers as $transfer) {
            fputcsv($handle, [
                $transfer->no_polisi,
                $transfer->nama_pemilik_lama,
                $transfer->nama_pemilik_baru,
                $transfer->status,
                $transfer->created_at->format('Y-m-d H:i:s'),
            ]);
        }
        
        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);
        
        return response($content, 200, [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}
