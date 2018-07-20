<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidationEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * @var
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @param $user
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    public function build()
    {
        $email = $this->user['email'];
        $subject = 'Validate Your Account';
        $application_user = \Config::get('anuj.application_user.name');
        $application_user_email = \Config::get('anuj.application_user.email');
        return $this->from([$application_user_email, $application_user])
            ->to($email)
            ->subject($subject)->markdown('emails.confirm-email')->with('message',$this->user);
    }
}
