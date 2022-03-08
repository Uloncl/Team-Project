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
	public function profile() {
		return view('profile');
	}
	public function settings() {
		return view('settings');
	}
	public function products($product) {
		switch ($product) {
			case "games":
				$product = "Games";
				return view('products', compact('product'));
				break;
			case "components":
				$product = "Components";
				return view('products', compact('product'));
				break;
			case "consoles":
				$product = "Consoles";
				return view('products', compact('product'));
				break;
			case "prebuilds":
				$product = "Pre-Builds";
				return view('products', compact('product'));
				break;
			default:
				$product = "no dont do that";
				return view('products', compact('product'));
				break;
		}
	}

	public function cart() {
		return view('cart');
	}
}
