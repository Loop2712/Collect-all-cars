<?php

namespace App\Mail;
use App\Models\LineMessagingAPI;
use App\Models\Guest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTo_sos_partner extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        try {
            $this->data =$data;
        } catch( Exception $e ){
            echo "ไม่พบที่อยู่เมล";
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;

        return $this->subject('ขอความช่วยเหลือ')
        ->view('mail.MailTo_sos_partner', compact('data') );
    }
}
