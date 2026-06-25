<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    public $vehicle;

    public function __construct($payment, $vehicle)
    {
        $this->payment = $payment;
        $this->vehicle = $vehicle;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice Pembayaran Pajak - ' . $this->payment->no_polisi,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.payment_invoice',
            with: [
                'payment' => $this->payment,
                'vehicle' => $this->vehicle,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
