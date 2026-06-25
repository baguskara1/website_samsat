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

<style>
.analytics-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.analytics-header {
    margin-bottom: 30px;
}

.analytics-header h1 {
    font-size: 28px;
    margin-bottom: 5px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    border: 2px solid #1e1e1e;
    border-radius: 10px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: -5px 5px 0px rgba(0,0,0,0.1);
}

.stat-icon {
    font-size: 32px;
}

.stat-number {
    font-size: 24px;
    font-weight: 700;
    color: #ff5c5c;
}

.quick-links {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 15px;
    margin-bottom: 30px;
}

.link-card {
    background: #ff5c5c;
    color: white;
    padding: 20px;
    border-radius: 10px;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s ease;
}

.link-card:hover {
    transform: translateY(-3px);
    box-shadow: -5px 5px 0px rgba(0,0,0,0.2);
}

.link-card span {
    font-size: 24px;
    display: block;
    margin-bottom: 10px;
}

.chart-section, .recent-section {
    background: white;
    border: 2px solid #1e1e1e;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

.chart-section h2, .recent-section h2 {
    margin-bottom: 15px;
    font-size: 18px;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table th {
    background: #f5f5f5;
    padding: 12px;
    text-align: left;
    border-bottom: 2px solid #1e1e1e;
    font-weight: 600;
}

.data-table td {
    padding: 12px;
    border-bottom: 1px solid #e0e0e0;
}

.data-table tbody tr:hover {
    background: #fbfbfb;
}
</style>
@endsection
