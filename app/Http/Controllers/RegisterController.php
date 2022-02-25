<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades;

class RegisterController extends Controller
{
    public function create(){
		return view('auth.register');
	}

    public function store(){

		$user = User::create(request()->validate([
			'name' 		=> 'required|max:255',
			'email' 	=> 'required|email|max:255|unique:users,email',
			'password' 	=> 'required|max:255|min:8'
		]));

		Auth()->login($user);

		return redirect('/')->with("success", "Your account has been created");
	}
}
