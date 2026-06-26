@extends('layouts.app')

@section('content')
<div class="analytics-container">
    <div class="analytics-header">
        <a href="{{ route('admin.analytics') }}" class="back-link">← Kembali</a>
        <h1>📊 Analytics Kendaraan</h1>
        <p>Statistik lengkap kendaraan terdaftar</p>
    </div>

    <div class="stats-row">
        <div class="stat-card">
            <h3>Total Kendaraan</h3>
            <p class="stat-number">{{ $total }}</p>
        </div>
    </div>

    <!-- Distribution by Type -->
    <div class="chart-section">
        <h2>Distribusi Berdasarkan Jenis Kendaraan</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Persentase</th>
                    <th>Visualisasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($by_type as $type)
                    <tr>
                        <td><strong>{{ $type->jenis }}</strong></td>
                        <td>{{ $type->count }}</td>
                        <td>{{ number_format(($type->count / $total * 100), 1) }}%</td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ ($type->count / $total * 100) }}%"></div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data kendaraan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Distribution by Year -->
    <div class="chart-section">
        <h2>Distribusi Berdasarkan Tahun Pembuatan</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Persentase</th>
                    <th>Visualisasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($by_year as $year)
                    <tr>
                        <td><strong>{{ $year->tahun_pembuatan }}</strong></td>
                        <td>{{ $year->count }}</td>
                        <td>{{ number_format(($year->count / $total * 100), 1) }}%</td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ ($year->count / $total * 100) }}%"></div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data</td>
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
            <input type="hidden" name="type" value="vehicles">
            <button type="submit" class="btn-export">📥 Download sebagai CSV</button>
        </form>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/analytics_vehicles.css') }}">
@endsection
