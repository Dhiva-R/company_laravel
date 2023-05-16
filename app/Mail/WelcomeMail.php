<?php

namespace App\Mail;



use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function __construct($employee)
    {
        $this->employee = $employee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome to Our Company')
            ->view('emails.welcome')
            ->with([
                'employee' => $this->employee,
            ]);
    }
}
