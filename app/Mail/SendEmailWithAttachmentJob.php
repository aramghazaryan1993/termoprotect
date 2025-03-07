<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailWithAttachmentJob extends Mailable
{
    use Queueable, SerializesModels;

    public $filePath;
    public $details;

    /**
     * Create a new message instance.
     *
     * @param string $filePath
     * @param string $details
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
        $this->filePath = $details['attach'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if (!empty($this->filePath))
        {
            return $this->view('send-email.send-email-jobs') // The Blade view for the email content
            ->subject($this->details['title']) // The email subject
            ->attach($this->filePath); // Attach the file
        }else{
            return $this->view('send-email.send-email-jobs') // The Blade view for the email content
            ->subject($this->details['title']); // The email subject
        }

    }
}
