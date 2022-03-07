<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Mail;
use App\Mail\SignUp;

class MailController extends Controller{
    public function sendMail() {
      $i = "i";
      Mail::to('fake@mail.com')->(new SignUp($i));
      return view('welcome');
    }
}
