<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminRegisterSender extends Mailable
{
    use Queueable, SerializesModels;
    public $data; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->mail = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->mail->token); 

        return $this->from("noreply@labs-studio.com")
                    ->subject('Bienvenu sur Labs Master')
                    ->with('login_token', $this->mail->token)
                    ->markdown('mail.adminregister');
    }
}
