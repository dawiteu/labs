<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;
    //public $mail; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->mail = $request; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('newsletter@labs-studio.com')
                    ->subject('Labs Studio: Nouveau post sur le blog!')
                    ->markdown('mail.newsletter');
    }
}
