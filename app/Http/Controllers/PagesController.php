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
	public function projects($name) {
		if ($name == null){
			return view('main.projects');
		} elseif ($name == "lewis") {
			return view('lewis.Lewis');
		} elseif ($name == "andrea") {
			return view('andrea.andrea');
		} elseif ($name == "ben") {
			return view('ben.ben');
		} elseif ($name == "aryan") {
			return view('aryan.aryan');
		} elseif ($name == "mabel") {
			return view('mabel.mabel');
		}
	}
}
