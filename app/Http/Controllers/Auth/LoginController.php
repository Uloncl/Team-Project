<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller{
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
