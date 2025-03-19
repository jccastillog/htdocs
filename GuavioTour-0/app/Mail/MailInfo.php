<?php

namespace App\Mail;

use AddressInfo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\Service;


class MailInfo extends Mailable
{
    use Queueable, SerializesModels;

    public $userName; // Nombre del usuario
    public $service;  // Servicio que se enviará en el correo

    public function __construct($userName, Service $service)
    {
        $this->userName = $userName;
        $this->service = $service;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail Información GuavioTour',
            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.mailInfo',
            with: [
                'userName' => $this->userName, // Pasar el nombre del usuario
                'service' => $this->service,   // Pasar el servicio
            ],
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
