<?php

namespace App\Mail;

use App\Models\StudentApplications;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewStudentApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public StudentApplications $application) {}

    public function build()
    {
        return $this->subject('New Student Application: '.$this->application->first_name.' '.$this->application->last_name)
            ->markdown('emails.new-student-application', [
                'app' => $this->application
            ]);
    }
}
