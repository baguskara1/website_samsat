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

<link rel="stylesheet" href="{{ asset('css/admin_payment_history.css') }}">
@endsection
