<?php

namespace App\Mail;
use App\Models\LineMessagingAPI;
use App\Models\Guest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailToPartner_area extends Mailable
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
        return $this->subject('แจ้งผลการตรวจสอบพื้นที่บริการ')
        ->view('mail.MailToPartner_area', compact('data') );
    }
}
