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

	public function saved() {

		$link = "https://www.amazon.co.uk/ASUS-GeForce-buffed-up-chart-topping-performance/dp/B095YF4L9W/ref=sr_1_8?crid=19PWXQ3S0M5BV&keywords=3080&qid=1646723576&sprefix=3080%2Caps%2C85&sr=8-8";
		$img  = "https://m.media-amazon.com/images/I/71F-iS7SfcS._AC_SX679_.jpg";
		return view('saved', [
			"link" => $link,
			"img"  => $img
		]);
	}
}
