<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignUp;

class MailController extends Controller
{
    public function sendMail()
    {
        Request()->validate(['email' => 'required|email']);

        Mail::raw('It works', function ($message) {
            $message->to(Request('email'))
                ->subject("Hello");
        });

        return view('auth.passwords.sent')->with("success", "email sent");
    }
}
