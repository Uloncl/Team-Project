<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function destroy() {
        auth()->logout();
        return redirect('/')->with('success', 'you are now logged out');
    }
    
    public function create() {
        return view('auth.login');
    }
    
    public function store() {
        if(auth()->attempt(request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]))) {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back!');
        }
        return back()
                ->withInput()
                ->withErrors(['email' => 'Your provided credentials could not be validated.']);
    }
}
