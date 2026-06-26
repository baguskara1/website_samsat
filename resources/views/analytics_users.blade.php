@extends('layouts.app')

@section('content')
<div class="analytics-container">
    <div class="analytics-header">
        <a href="{{ route('admin.analytics') }}" class="back-link">← Kembali</a>
        <h1>👥 Analytics Pengguna</h1>
        <p>Statistik pengguna SAMSAT DIY</p>
    </div>

    <div class="stats-row">
        <div class="stat-card">
            <h3>Total Pengguna</h3>
            <p class="stat-number">{{ $total }}</p>
        </div>
        <div class="stat-card">
            <h3>Pengguna Bulan Ini</h3>
            <p class="stat-number">{{ $active }}</p>
        </div>
    </div>

    <!-- Registrations by Month -->
    <div class="chart-section">
        <h2>Registrasi Pengguna Per Bulan (12 Bulan Terakhir)</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Jumlah Pendaftar</th>
                    <th>Visualisasi</th>
                </tr>
            </thead>
            <tbody>
                @php $max_count = $registrations_by_month->max('count') ?? 1; @endphp
                @forelse($registrations_by_month as $month)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($month->month)->format('M Y') }}</td>
                        <td>{{ $month->count }}</td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ ($month->count / $max_count * 100) }}%"></div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Export Options -->
    <div class="export-section">
        <h2>Export Data</h2>
        <form action="{{ route('admin.analytics.export') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="users">
            <button type="submit" class="btn-export">📥 Download sebagai CSV</button>
        </form>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/analytics_users.css') }}">
@endsection
