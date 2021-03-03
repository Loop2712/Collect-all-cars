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
    public function __construct($name , $reply , $postback_data)
    {
        $this->name =$name;
        $this->reply =$reply;
        $this->postback_data =$postback_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->name;
        $reply = $this->reply;
        $postback_data = $this->postback_data;

        return $this->subject('This is my Test Mail Subject')
        ->view('mail.testmail', compact('name' ,'reply' , 'postback_data') );
    }
}
