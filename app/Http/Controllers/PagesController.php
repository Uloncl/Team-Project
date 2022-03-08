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
		$products = [
			[
				"title" => "ASUS TUF Gaming GeForce RTX™ 3080 Ti OC Edition 12GB GDDR6X",
				"link"  => "https://www.amazon.co.uk/ASUS-GeForce-buffed-up-chart-topping-performance/dp/B095YF4L9W/ref=sr_1_8?crid=19PWXQ3S0M5BV&keywords=3080&qid=1646723576&sprefix=3080%2Caps%2C85&sr=8-8",
				"img"   => "https://m.media-amazon.com/images/I/71F-iS7SfcS._AC_SX679_.jpg",
				"best"  => "1800",
				"avg"   => "1900"
			],[
				"title" => "AMD Ryzen Threadripper 3990X",
				"link"  => "https://www.amazon.co.uk/DANIPEW-AMD-Ryzen-Threadripper-3990X/dp/B0815SBQ9W/ref=sr_1_fkmr1_2?keywords=AMD%20RYZEN%20THREADRIPPER%203990X&qid=1581093524&sr=8-2-fkmr1%0D%0A",
				"img"   => "https://m.media-amazon.com/images/I/711VabzLQ2L._AC_SX679_.jpg",
				"best"  => "3900",
				"avg"   => "4000"
			],[
				"title" => "Elden Ring",
				"link"  => "https://store.steampowered.com/app/1245620/ELDEN_RING/",
				"img"   => "https://cdn.akamai.steamstatic.com/steam/apps/1245620/header.jpg?t=1646406355",
				"best"  => "40",
				"avg"   => "50"
			],
		];

		$total = array_sum(array_column($products, 'best'));

		return view('saved', [
			"products" => $products,
			"total"	   => $total
		]);
	}
}
