@extends('layouts.app')

@section('content')
<div class="payment-container">
    <div class="header">
        <a href="/admin/dashboard" class="back-link">← Kembali</a>
        <h1>💰 Payment History</h1>
        <p>Riwayat pembayaran pajak kendaraan</p>
    </div>

    <!-- Stats -->
    <div class="stats-row">
        <div class="stat-card">
            <h3>Total Pembayaran</h3>
            <p class="stat-number">{{ $totalPayments }}</p>
        </div>
        <div class="stat-card">
            <h3>Total Nominal</h3>
            <p class="stat-number">Rp {{ number_format($totalNominal, 0, ',', '.') }}</p>
        </div>
        <div class="stat-card">
            <h3>Pembayaran Sukses</h3>
            <p class="stat-number">{{ $completedPayments }}</p>
        </div>
    </div>

    <!-- Payment Table -->
    <div class="table-section">
        <h2>Daftar Pembayaran</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>No Polisi</th>
                    <th>Email</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Tanggal Bayar</th>
                    <th>Berlaku Hingga</th>
                    <th>Transaction ID</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $payment)
                    <tr>
                        <td><strong>{{ $payment->no_polisi }}</strong></td>
                        <td>{{ $payment->email }}</td>
                        <td>Rp {{ number_format($payment->nominal, 0, ',', '.') }}</td>
                        <td>
                            @if($payment->status === 'completed')
                                <span class="badge badge-success">✓ COMPLETED</span>
                            @elseif($payment->status === 'pending')
                                <span class="badge badge-warning">⏳ PENDING</span>
                            @elseif($payment->status === 'failed')
                                <span class="badge badge-danger">✗ FAILED</span>
                            @else
                                <span class="badge badge-secondary">{{ ucfirst($payment->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $payment->paid_at ? $payment->paid_at->format('d M Y H:i') : '-' }}</td>
                        <td>{{ $payment->valid_until->format('d M Y') }}</td>
                        <td><small>{{ $payment->midtrans_transaction_id }}</small></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada pembayaran</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        @if($payments->hasPages())
            <div class="pagination">
                {{ $payments->links() }}
            </div>
        @endif
    </div>
</div>

<style>
.payment-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.header {
    margin-bottom: 30px;
}

.back-link {
    display: inline-block;
    color: #ff5c5c;
    text-decoration: none;
    font-weight: 600;
    margin-bottom: 15px;
}

.header h1 {
    font-size: 28px;
    margin: 10px 0 5px;
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
    font-size: 28px;
    font-weight: 700;
    color: #ff5c5c;
    margin: 10px 0;
}

.table-section {
    background: white;
    border: 2px solid #1e1e1e;
    border-radius: 10px;
    padding: 20px;
}

.table-section h2 {
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

.badge {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 600;
}

.badge-success {
    background: #d4edda;
    color: #155724;
}

.badge-warning {
    background: #fff3cd;
    color: #856404;
}

.badge-danger {
    background: #f8d7da;
    color: #721c24;
}

.badge-secondary {
    background: #e2e3e5;
    color: #383d41;
}

.text-center {
    text-align: center;
    color: #999;
}

.pagination {
    margin-top: 20px;
    text-align: center;
}
</style>
@endsection
