<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
		return view('auth.register');
	}

    public function store(){

		$attributes = request()->validate([
			'name' 		=> 'required|max:255',
			'email' 	=> 'required|email|max:255',
			'password' 	=> 'required|max:255|min:8'
		]);

		$attributes['password'] = bcrypt($attributes['password']);

		User::create($attributes);

		return redirect('/');
	}
}
