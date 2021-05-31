<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mail; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $pass)
    {
        $this->mail = $request;
        $this->pass = $pass; 
        //dd($this->mail, $this->pass); 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@labs-studio.com')
                    ->subject('Labs Studio: Inscription confirmation')
                    ->markdown('mail.welcomemail')
                    ->with('pass', $this->pass);
    }
}
