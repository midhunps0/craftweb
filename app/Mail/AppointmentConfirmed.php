<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    private $appointmentId;
    private $date;
    private $time;
    private $name;
    private $phone;
    private $email;
    private $spName;
    private $consName;

    /**
     * Create a new message instance.
     */
    public function __construct(
        $appointmentId,
        $date,
        $time,
        $name,
        $phone,
        $email,
        $spName,
        $consName
    )
    {
        $this->appointmentId = $appointmentId;
        $this->date = $date;
        $this->time = $time;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->spName = $spName;
        $this->consName = $consName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Youy Appointment Confirmed At Craft IVF Hospital',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.booking-confirmed',
            with: [
                'appointment_id' => $this->appointmentId,
                'date' => $this->date,
                'time' => $this->time,
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'sp_name' => $this->spName,
                'cons_name' => $this->consName,
            ]
        );
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
