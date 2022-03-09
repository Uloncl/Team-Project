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
				$products = [
					[//1
						"name"  => "Elden Ring",
						"dev"   => "From Software",
						"pub"   => "From Software",
						"link"  => "https://store.steampowered.com/app/1245620/ELDEN_RING/",
						"img"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/13e02498b2ae3df0c9078db2f9eb9b2d.webp",
						"best"  => "49.99"
					],[//2
						"name"  => "Cyberpunk 2077",
						"dev"   => "CD Project Red",
						"pub"   => "CD Project Red",
						"link"  => "https://www.gog.com/en/game/cyberpunk_2077",
						"img"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/561adbb4e6094bef3c29e38ceb6bd929.png",
						"best"  => "49.99"
					],[//3
						"name"  => "AC Valhalla",
						"dev"   => "Ubisoft Montreal",
						"pub"   => "Ubisoft",
						"link"  => "https://store.ubi.com/uk/game?pid=5e849c6c5cdf9a21c0b4e731&dwvar_5e849c6c5cdf9a21c0b4e731_Platform=pcdl&edition=Standard%20Edition&source=detail",
						"img"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/914179592aa3523210dd00c0bb030c30.png",
						"best"  => "49.99"
					],[//4
						"name"  => "God of War",
						"dev"   => "Santa Monica Studio",
						"pub"   => "Santa Monica Studio",
						"link"  => "https://www.epicgames.com/store/en-US/p/dying-light-2-stay-human",
						"img"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/5855660034a74cfe0e5fc8d57d17f4ac.png",
						"best"  => "39.99"
					],[//5
						"name"  => "GTA V",
						"dev"   => "Rockstar Games",
						"pub"   => "Rockstar Games",
						"link"  => "https://www.epicgames.com/store/en-US/p/grand-theft-auto-v",
						"img"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/43f6943d7a020cdcb8d27aebb9d96221.png",
						"best"  => "14.99"
					],[//6
						"name"  => "Arkham Knight",
						"dev"   => "Ubisoft Annecy",
						"pub"   => "Ubisoft",
						"link"  => "https://store.steampowered.com/app/208650/Batman_Arkham_Knight/",
						"img"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/0ea50e88822a30ab6cd93ba4a082d614.png",
						"best"  => "15.99"
					],[//7
						"name"  => "Riders Republic",
						"dev"   => "From Software",
						"pub"   => "From Software",
						"link"  => "https://www.epicgames.com/store/en-US/p/riders-republic",
						"img"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/3d02d7d499c5801377ccbddcf8b0759e.png",
						"best"  => "29.99"
					],[//8
						"name"  => "Ghostrunner",
						"dev"   => "505 Games",
						"pub"   => "505 Games",
						"link"  => "https://store.steampowered.com/app/1139900/Ghostrunner/",
						"img"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/458e998ed46376eb777b4df39beb02ce.png",
						"best"  => "9.99"
					]
				];
		
				$total = array_sum(array_column($products, 'best'));
				return view('products', [
					"product"    => $product,
					"products" => $products
				]);
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
