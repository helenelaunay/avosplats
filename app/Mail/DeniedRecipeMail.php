<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DeniedRecipeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Crée une nouvelle instance de message.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Construire le message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contact@vosplats.fr')
                    ->subject('Refus/Suppression de votre recette')
                    ->view('email.deniedRecipe'); // Nom de la vue d'e-mail
    }
}
