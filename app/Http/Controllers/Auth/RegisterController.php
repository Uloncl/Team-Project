<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller{
    protected function create(){
		return view('auth.register');
    }

    protected function store(){
		$user = User::create(request()->validate([
			'name' 		=> 'required|max:255',
			'email' 	=> 'required|email:rfc,dns|max:255|unique:users,email',
			'password' 	=> 'required|max:255|min:8'
		]));

		Auth()->login($user);

		return redirect('/')->with("success", "Your account has been created");
    }
}
