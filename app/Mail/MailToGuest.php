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
    public function __construct(LineMessagingAPI $messaging)
    {
        $this->messaging =$messaging;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $messaging = $this->messaging;
        return $this->subject('This is my Test Mail Subject')
        ->view('mail.testmail', compact('messaging') );
}
