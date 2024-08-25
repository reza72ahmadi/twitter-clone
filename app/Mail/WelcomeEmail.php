<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Attachment;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    private User $user

    public function __construct(User $user)
    {
        $this->user =  $user;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thanks for joining '. config('app.name',''),
        );
    }

  
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome-email',
            with:[
                'user' => $this->user
            ]
        );
    }

 
    public function attachments(): array
    {
        return [
            Attachment::fromStorageDisk('public','profile/')
        ];
    }
}
