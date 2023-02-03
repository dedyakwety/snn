<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class Confirmation_compte extends Mailable
{
    use Queueable, SerializesModels;

    public $user_email = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $user_mail)
    {
        $this->user_email = $user_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('dadfavori@gmail.com')
                    ->subject('Créattion du compte avec succès')
                    ->view('emails.creatiton_compte');
    }
}
