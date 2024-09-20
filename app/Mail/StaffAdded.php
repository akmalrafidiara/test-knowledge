<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StaffAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $staff;

    /**
     * Create a new message instance.
     */
    public function __construct($staff)
    {
        $this->staff = $staff;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Staff Added',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return $this->view('emails.staff_added')->with([
            'staffName' => $this->staff->name,
        ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
