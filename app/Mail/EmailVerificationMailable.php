<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerificationMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $sendMail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sendMail)
    {
        $this->sendMail = $sendMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "inscription";
        return $this->subject($subject)->view('admin.email.verification');
    }
}
