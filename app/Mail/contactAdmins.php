<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactAdmins extends Mailable
{
    use Queueable, SerializesModels;

    private $mail;
    private $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail, $msg)
    {
        $this->mail = $mail;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mail)
                    ->view('emails.contactadmins')
                    ->with([
                        'mail' => $this->mail,
                        'msg' => $this->msg
                    ]);
    }
}
