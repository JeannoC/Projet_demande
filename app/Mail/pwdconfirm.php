<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class pwdconfirm extends Mailable
{
    use Queueable, SerializesModels;
    public $nom,$token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom, $token)
    {
        $this->nom=$nom;
        $this->token=$token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /* return $this->view('view.name'); */
        return $this->from('kolibalobeguilawogui@gmail.com')->markdown('pwdconfirm');
    }
}
