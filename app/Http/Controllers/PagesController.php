<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	public function home() {
		return view('index');
	}
	public function about() {
		return view('about');
	}
	public function project() {
        auth()->logout();
		return view('project');
	}
	public function tour() {
		return view('tour');
	}
	public function product() {
		return view('product');
	}
	public function features() {
		return view('features');
	}
	public function enterprise() {
		return view('enterprise');
	}
	public function support() {
		return view('support');
	}
	public function pricing() {
		return view('pricing');
	}
	public function cart() {
		return view('cart');
	}
}
