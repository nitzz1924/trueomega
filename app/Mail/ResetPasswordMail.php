<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageBody;  // Renaming to avoid conflicts
    public $subjectText;  // Renaming to avoid conflicts
    public $encryptedEmail;  // Renaming to avoid conflicts

    public function __construct($message, $subject, $encryptedEmail)
    {
        $this->messageBody = $message;
        $this->subjectText = $subject;
        $this->encryptedEmail = $encryptedEmail;
    }

    public function envelope()
    {
        return new \Illuminate\Mail\Mailables\Envelope(
            subject: $this->subjectText,
        );
    }

    public function content()
    {
        return new \Illuminate\Mail\Mailables\Content(
            view: 'emails.ResetPassword',
            with: [
                'messageBody' => $this->messageBody,
                'subjectText' => $this->subjectText,
                'encryptedEmail' => $this->encryptedEmail,
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}

