<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormMessageToEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $postArray;

    public function __construct($postArray) {
        $this->name = $postArray["name"];
        $this->postArray = $postArray;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.message', ['name' => $this->name, 'postArray' => $this->postArray]);
    }
}
