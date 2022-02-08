<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	public function home() {
		return view('main.index');
	}
	public function about() {
		return view('main.about');
	}
	public function project() {
		return view('main.project');
	}
	public function settings() {
		return view('main.settings');
	}
	public function profile() {
		return view('main.profile');
	}
}
