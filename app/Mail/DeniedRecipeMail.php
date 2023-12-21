<?php

namespace App\Mail;

use App\Models\Recipe;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeniedRecipeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Crée une nouvelle instance de message.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
