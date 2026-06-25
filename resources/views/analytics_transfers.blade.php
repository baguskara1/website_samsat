@extends('layouts.app')

@section('content')
<div class="analytics-container">
    <div class="analytics-header">
        <a href="{{ route('admin.analytics') }}" class="back-link">← Kembali</a>
        <h1>📋 Analytics Transfer Nama</h1>
        <p>Statistik proses transfer kepemilikan kendaraan</p>
    </div>

    <div class="stats-row">
        <div class="stat-card">
            <h3>Total Transfer</h3>
            <p class="stat-number">{{ $total }}</p>
        </div>
    </div>

    <!-- Status Distribution -->
    <div class="chart-section">
        <h2>Distribusi Status Transfer</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Persentase</th>
                    <th>Visualisasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($by_status as $status)
                    <tr>
                        <td>
                            <span class="status-badge status-{{ $status->status }}">
                                {{ ucfirst($status->status) }}
                            </span>
                        </td>
                        <td>{{ $status->count }}</td>
                        <td>{{ number_format(($status->count / $total * 100), 1) }}%</td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ ($status->count / $total * 100) }}%"></div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data transfer</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Recent Transfers -->
    <div class="chart-section">
        <h2>Transfer Terbaru</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>No Polisi</th>
                    <th>Pemilik Lama</th>
                    <th>Pemilik Baru</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recent as $transfer)
                    <tr>
                        <td><strong>{{ $transfer->no_polisi }}</strong></td>
                        <td>{{ $transfer->nama_pemilik_lama }}</td>
                        <td>{{ $transfer->nama_pemilik_baru }}</td>
                        <td>
                            <span class="status-badge status-{{ $transfer->status }}">
                                {{ ucfirst($transfer->status) }}
                            </span>
                        </td>
                        <td>{{ $transfer->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data transfer</td>
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
            <input type="hidden" name="type" value="transfers">
            <button type="submit" class="btn-export">📥 Download sebagai CSV</button>
        </form>
    </div>
</div>

<style>
.analytics-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.back-link {
    display: inline-block;
    color: #ff5c5c;
    text-decoration: none;
    font-weight: 600;
    margin-bottom: 15px;
}

.analytics-header {
    margin-bottom: 30px;
}

.analytics-header h1 {
    font-size: 28px;
    margin: 10px 0 5px;
}

.analytics-header p {
    color: #666;
}

.stats-row {
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
    text-align: center;
    box-shadow: -5px 5px 0px rgba(0,0,0,0.1);
}

.stat-number {
    font-size: 32px;
    font-weight: 700;
    color: #ff5c5c;
    margin: 10px 0;
}

.chart-section {
    background: white;
    border: 2px solid #1e1e1e;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

.chart-section h2 {
    margin-bottom: 15px;
    font-size: 18px;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    overflow-x: auto;
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

.status-badge {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.status-pending {
    background: #fff3cd;
    color: #856404;
}

.status-completed {
    background: #d4edda;
    color: #155724;
}

.status-rejected {
    background: #f8d7da;
    color: #721c24;
}

.progress-bar {
    background: #f0f0f0;
    border-radius: 5px;
    height: 20px;
    overflow: hidden;
}

.progress-fill {
    background: #ff5c5c;
    height: 100%;
}

.text-center {
    text-align: center;
    color: #999;
}

.export-section {
    background: white;
    border: 2px solid #1e1e1e;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
}

.btn-export {
    background: #ff5c5c;
    color: white;
    border: 2px solid #1e1e1e;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-export:hover {
    transform: translateY(-2px);
    box-shadow: -3px 3px 0px rgba(0,0,0,0.2);
}
</style>
@endsection
