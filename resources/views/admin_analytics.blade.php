@extends('layouts.app')

@section('content')
<div class="analytics-container">
    <div class="analytics-header">
        <h1>📊 Dashboard Analytics</h1>
        <p>Ringkasan statistik SAMSAT DIY</p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon users">👥</div>
            <div class="stat-content">
                <h3>Total Pengguna</h3>
                <p class="stat-number">{{ $stats['total_users'] }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon vehicles">🚗</div>
            <div class="stat-content">
                <h3>Total Kendaraan</h3>
                <p class="stat-number">{{ $stats['total_vehicles'] }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon transfers">📝</div>
            <div class="stat-content">
                <h3>Total Transfer</h3>
                <p class="stat-number">{{ $stats['total_transfers'] }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon pending">⏳</div>
            <div class="stat-content">
                <h3>Transfer Pending</h3>
                <p class="stat-number">{{ $stats['pending_transfers'] }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon completed">✅</div>
            <div class="stat-content">
                <h3>Transfer Selesai</h3>
                <p class="stat-number">{{ $stats['completed_transfers'] }}</p>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="quick-links">
        <a href="{{ route('admin.analytics.vehicles') }}" class="link-card">
            <span>📊</span>
            <h3>Analytics Kendaraan</h3>
        </a>
        <a href="{{ route('admin.analytics.users') }}" class="link-card">
            <span>👥</span>
            <h3>Analytics Pengguna</h3>
        </a>
        <a href="{{ route('admin.analytics.transfers') }}" class="link-card">
            <span>📋</span>
            <h3>Analytics Transfer</h3>
        </a>
    </div>

    <!-- Vehicle Types Distribution -->
    <div class="chart-section">
        <h2>Distribusi Jenis Kendaraan</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Persentase</th>
                </tr>
            </thead>
            <tbody>
                @php $total = $stats['total_vehicles']; @endphp
                @foreach($vehicle_types as $type)
                    <tr>
                        <td>{{ $type->jenis }}</td>
                        <td>{{ $type->count }}</td>
                        <td>{{ number_format(($type->count / $total * 100), 1) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Recent Registrations -->
    <div class="recent-section">
        <h2>Registrasi Pengguna Terbaru</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recent_registrations as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Recent Vehicles -->
    <div class="recent-section">
        <h2>Kendaraan Terbaru</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>No Polisi</th>
                    <th>Pemilik</th>
                    <th>Merk</th>
                    <th>Jenis</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recent_vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->no_polisi }}</td>
                        <td>{{ $vehicle->nama_pemilik }}</td>
                        <td>{{ $vehicle->merk }}</td>
                        <td>{{ $vehicle->jenis }}</td>
                        <td>{{ $vehicle->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/admin_analytics.css') }}">
@endsection
