<?php

namespace App\Mail;
use App\Models\LineMessagingAPI;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailToGuest_notcomfor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data =$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        return $this->subject('การตอบกลับจากเจ้าของรถที่ท่านติดต่อ')
        ->view('mail.MailToGuest_notcomfor', compact('data') );
    }
}
