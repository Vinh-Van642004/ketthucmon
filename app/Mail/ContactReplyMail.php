<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $replyMessage;

    public function __construct($replyMessage)
    {
        $this->replyMessage = $replyMessage;
    }

    public function build()
    {
        return $this->view('emails.contact_reply')
                    ->subject('Phản hồi liên hệ của bạn')
                    ->with([
                        'replyMessage' => $this->replyMessage,
                    ]);
    }
}
