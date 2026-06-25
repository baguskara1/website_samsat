<?php

namespace App\Mail;

use App\Models\Kendaraan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public Kendaraan $vehicle;
    public string $emailTo;
    public string $paymentDate;

    public function __construct(Kendaraan $vehicle, string $emailTo)
    {
        $this->vehicle = $vehicle;
        $this->emailTo = $emailTo;
        $this->paymentDate = now()->format('d F Y H:i');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Pembayaran Pajak - SAMSAT DIY',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.payment_confirmation',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
