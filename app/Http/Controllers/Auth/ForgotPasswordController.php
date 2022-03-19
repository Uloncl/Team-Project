<?php

namespace App\Http\Controllers\Auth;


 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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


    
	public function forgot() {
		return view('auth.passwords.email');
	}


    public function update(Request $request){
        
        Request()->validate(['email'=>'required|email']);
        
        Mail::raw('It works', function($message){
            $message->to(Request('email'))
                ->subject("Hello");
        });

        return redirect('/contact')
            ->with('message', 'email sent');
    }
}