<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecommendationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $recomendaciones;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recomendaciones)
    {
        $this->recomendaciones = $recomendaciones;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.recommendations')
                    ->subject('Recomendaciones Personalizadas para tu Experiencia Bancaria')
                    ->with('recomendaciones', $this->recomendaciones);
    }
}
