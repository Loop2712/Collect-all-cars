<?php

namespace App\Mail;
use App\Models\LineMessagingAPI;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailToGuest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event =$event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $event = $this->event;
        return $this->subject('This is my Test Mail Subject')
        ->view('mail.testmail', compact('event') );
    }
}
