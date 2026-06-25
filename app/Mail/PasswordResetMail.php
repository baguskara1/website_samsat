<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $token;
    public int $userId;

    public function __construct(string $name, string $token, int $userId)
    {
        $this->name = $name;
        $this->token = $token;
        $this->userId = $userId;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reset Password - SAMSAT DIY',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.password_reset',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
