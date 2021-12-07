<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contact extends Mailable
{
    use Queueable, SerializesModels;

    public $firstname;
    public $lastname;
    public $phonenumber;
    public $companyname;
    public $email;
    public $subject;
    public $message;

    public function __construct($firstname, $lastname,  $phonenumber,  $companyname, $email, $subject, $message )
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phonenumber = $phonenumber;
        $this->companyname = $companyname;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function build()
    {
        return $this->markdown('mails.contact');
    }
}
