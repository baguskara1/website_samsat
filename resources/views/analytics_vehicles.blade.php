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

<style>
.analytics-container {
    max-width: 1000px;
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

.progress-bar {
    background: #f0f0f0;
    border-radius: 5px;
    height: 20px;
    overflow: hidden;
}

.progress-fill {
    background: #ff5c5c;
    height: 100%;
    transition: width 0.3s ease;
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
