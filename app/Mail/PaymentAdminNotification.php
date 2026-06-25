<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;

    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notifikasi Pembayaran Pajak - ' . $this->payment->no_polisi,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.payment_admin_notification',
            with: [
                'payment' => $this->payment,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
