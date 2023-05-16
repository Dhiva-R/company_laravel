<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(){

        $details=[
           'title'=>'mail testing',
            'body'=>'this is an test email'
        ];
        Mail::to("workdhiva@gmail.com")->send(new WelcomeMail($details));
        return "Email Sent";

    }
    }

