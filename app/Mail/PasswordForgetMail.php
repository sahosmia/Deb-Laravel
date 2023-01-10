<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordForgetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email = "";
    public $id = "";
    public function __construct($email, $id)
    {
        $this->email = $email;
        $this->id = $id;
    }

    public function build(){
        return $this->subject('Reset Password Link')->view('email.password-forget');
    }

    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Password Forget Mail',
    //     );
    // }


    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }


    // public function attachments()
    // {
    //     return [];
    // }
}
