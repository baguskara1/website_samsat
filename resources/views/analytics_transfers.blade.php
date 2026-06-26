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

<link rel="stylesheet" href="{{ asset('css/analytics_transfers.css') }}">
@endsection
