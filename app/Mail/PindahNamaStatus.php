<?php

namespace App\Mail;

use App\Models\PindahNama;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PindahNamaStatus extends Mailable
{
    use Queueable, SerializesModels;

    public PindahNama $pindahNama;
    public string $statusText;

    public function __construct(PindahNama $pindahNama, string $statusText)
    {
        $this->pindahNama = $pindahNama;
        $this->statusText = $statusText;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Status Permohonan Pindah Nama - SAMSAT DIY',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.pindah_nama_status',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
