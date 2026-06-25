<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TransferStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public string $no_polisi;
    public string $old_owner;
    public string $new_owner;
    public string $status;
    public string $date;
    public string $admin_email;

    public function __construct(string $no_polisi, string $old_owner, string $new_owner, string $status, string $admin_email)
    {
        $this->no_polisi = $no_polisi;
        $this->old_owner = $old_owner;
        $this->new_owner = $new_owner;
        $this->status = $status;
        $this->date = now()->format('d M Y H:i');
        $this->admin_email = $admin_email;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Notifikasi Transfer Nama Kendaraan - $this->no_polisi",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.transfer_admin_notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
