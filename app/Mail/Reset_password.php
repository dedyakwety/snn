<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reset_password extends Mailable
{
    use Queueable, SerializesModels;

    public $code = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $code)
    {
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('dadfavori@gmail.com')
                    ->subject('Code de reinitialisation de mot de passe')
                    ->view('emails.reset_password');
    }
}
