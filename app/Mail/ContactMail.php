<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    private $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contact = Contact::where('email', $this->email)->latest();
        $message = $contact->message;
        $subject = 'Contact Message';
        $application_user = \Config::get('anuj.application_user.name');
        $application_user_email = \Config::get('anuj.application_user.email');

        $email = $this->email;
        return $this->from([$application_user_email, $application_user])
            ->to($email)
            ->subject($subject)->markdown('emails.contact')->with($message);
    }
}
