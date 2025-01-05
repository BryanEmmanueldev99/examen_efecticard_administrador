<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ActivacionLogin extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

     /**
     * Crear una nueva instancia de mensaje.
     */
    public function __construct(
        $data
    )
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('bryandevphp@gmail.com', 'Bryan'),
            subject: '¡Activación de login aprobada!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.activacionlogin',
            with: [
                'usuario_nombre' => $this->data['name'],
                'usuario_email' => $this->data['email']
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
