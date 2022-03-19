<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Sentinel;
use Reminder;
use App\User;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    
	public function forgot() {
		return view('auth.passwords.email');
	}
    
	public function update(Request $request) {
        $user = User::whereEmail($request->$email)->first(); 
        if("Get email from database"){
            return redirect()->back()->with(['error' => 'Email does not exist']);
        }

        $user = Sentinel::findById($user->id);
        $reminder = Reminder::exists($user) ? : Reminder::create($user);
        $this->sendEmail($user, $reminder->code);
		return view('auth.passwords.email')->with('success', 'check you emails to verify that your password can be changed');
	}

    public function sendEmail($user, $code){
        Mail:send(
            'email.forgot',
            ['user' => $user, 'code', $code],
            function($message) use ($user){
                $message->to($user->email);
                $message->subject("Hello $user->name", "Reset your password."); 
            }
        );
    }
}
