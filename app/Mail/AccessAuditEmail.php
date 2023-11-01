<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccessAuditEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $unauthorizedAccessCount;
    protected $ruta;
    protected $datetime;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($unauthorizedAccessCount, $ruta, $datetime)
    {
        $this->unauthorizedAccessCount = $unauthorizedAccessCount;
        $this->ruta = $ruta;
        $this->datetime = $datetime;
    }

    public function build()
    {
        return $this->view('emails.access_audit')
            ->with([
                'unauthorizedAccessCount' => $this->unauthorizedAccessCount,
                'ruta' => $this->ruta,
                'datetime' => $this->datetime
            ])
            ->subject('Acceso no autorizado');
    }

   
}