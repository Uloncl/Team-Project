<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
	public function home()
	{
		return view('index');
	}
	public function about()
	{
		return view('about');
	}
	public function profile()
	{
		return view('profile');
	}
	public function settings()
	{
		return view('settings');
	}
	public function products($category, $orientation = "horizontal")
	{
		switch ($category) {
			case "games":
				$products = DB::table('games')->where('type', 'game')->where('banned', false)->orderBy('recommendations', 'desc')->paginate(20);//->get('id', 'title', 'best_price', 'steam_url');
				foreach ($products as $key => $product) {
					$creditIDsObj = DB::table('game_credits_mappings')->where('game_id', $product->id)->get('credit_id');
					$creditIDs = [];
					foreach ($creditIDsObj as $c) {
						$creditIDs[] = $c->credit_id;
					}
					Log::info($creditIDs);
					$product->best_price = $product->best_price == '' ? null : substr_replace($product->best_price, '.', strlen($product->best_price)-2, 0);
					$product->developer = DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'developer')->exists() ? DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'developer')->get()->first()->name : null;
					$product->publisher = DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'publisher')->exists() ? DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'publisher')->get()->first()->name : null;
					$product->header_image = DB::table('game_images')
												->where('game_id', $product->id)
												->where('type', 'header')
												->get()->first()->full;
				}
				// return $products;
				return view('products', [
					"category"    	=> $category,
					"orientation"   => $orientation,
					"products" 		=> $products
				]);
				break;
			case "components":
				$products = [
					[ //1
						"name"  => "NVIDIA GeForce RTX 3090 FE",
						"type"  => "gpu",
						"specs"   => [
							"CUDA cores: 10496",
							"boost clock: 1.7GHz",
							"memory: 24GB"
						],
						"link"  => "#",
						"img-hori"   => "https://assets.nvidia.partners/images/png/nvidia-geforce-rtx-3090.png",
						"img-vert"   => "https://assets.nvidia.partners/images/png/nvidia-geforce-rtx-3090.png",
						"best"  => "2100.00"
					],
					[ //2
						"name"  => "NZXT Kraken Z73 AIO Cooler",
						"type"  => "water cooler",
						"specs"   => [
							"pump speed: 10496"
						],
						"link"  => "#",
						"img-hori"   => "https://m.media-amazon.com/images/I/71xtDBbXZyL._AC_SX679_.jpg",
						"img-vert"   => "https://m.media-amazon.com/images/I/71xtDBbXZyL._AC_SX679_.jpg",
						"best"  => "249.99"
					],
					[ //3
						"name"  => "Intel Core i9-11900K Desktop Processor",
						"type"  => "cpu",
						"specs"   => [
							"cores: 8",
							"threads: 16",
							"max clock speed: 5.30Ghz"
						],
						"link"  => "#",
						"img-hori"   => "https://m.media-amazon.com/images/I/41jGx-EgaJL._AC_.jpg",
						"img-vert"   => "https://m.media-amazon.com/images/I/41jGx-EgaJL._AC_.jpg",
						"best"  => "545.00"
					],
					[ //4
						"name"  => "G.SKILL Trident Z RGB Series",
						"type"  => "ram",
						"specs"   => [
							"capacity: 64GB",
							"type: 288-pin DDR4 SDRAM",
							"speed: 3600"
						],
						"link"  => "#",
						"img-hori"   => "https://www.gskill.com/_upload/images/1809101101280.png",
						"img-vert"   => "https://www.gskill.com/_upload/images/1809101101280.png",
						"best"  => "112.99"
					],
					[ //5
						"name"  => "Samsung 980 1 TB Solid State Drive",
						"type"  => "SSD",
						"specs"   => [
							"capacity: 1TB",
							"read speed: 7GB/s",
							"write speed: 5.1GB/s"
						],
						"link"  => "#",
						"img-hori"   => "https://images.samsung.com/is/image/samsung/p6pim/uk/mz-v8v1t0bw/gallery/uk-980-nvme-m2-ssd-mz-v8v1t0bw-399698720?$2052_1641_PNG$",
						"img-vert"   => "https://images.samsung.com/is/image/samsung/p6pim/uk/mz-v8v1t0bw/gallery/uk-980-nvme-m2-ssd-mz-v8v1t0bw-399698720?$2052_1641_PNG$",
						"best"  => "110.00"
					]
				];


				return view('products', [
					"category"    	=> $category,
					"orientation"   => $orientation,
					"products" 		=> $products
				]);
				break;
			case "consoles":
				$products = [
					[ //1
						"name"  => "PlayStation 5 Disc",
						"brand"   => "Sony",
						"desc"   => "Disk Edition",
						"link"  => "https://www.playstation.com/en-gb/ps5/",
						"img-hori"   => "https://m.media-amazon.com/images/I/61W3QAWieSL._AC_SX679_.jpg",
						"img-vert"   => "https://m.media-amazon.com/images/I/61W3QAWieSL._AC_SX679_.jpg",
						"best"  => "449.99"
					], [ //1
						"name"  => "PlayStation 5 Digital",
						"brand"   => "Sony",
						"desc"   => "Digital Edition",
						"link"  => "https://www.playstation.com/en-gb/ps5/",
						"img-hori"   => "https://cdn.media.amplience.net/i/currysprod/10205198?\$l-large$&fmt=auto",
						"img-vert"   => "https://cdn.media.amplience.net/i/currysprod/10205198?\$l-large$&fmt=auto",
						"best"  => "359.99"
					], [ //1
						"name"  => "Xbox Series X",
						"brand"   => "Microsoft",
						"desc"   => "Best Version",
						"link"  => "https://www.xbox.com/en-GB/consoles/xbox-series-x",
						"img-hori"   => "https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcRG4rakR2orK4xT8SMQJ6POoY3VlzEPH8DVZFyoT90V-fFCm7r2ff8lkwiKTUZm6VOwkucN6ytYuIVQTtKFN1Rr_HYsveznGL1CdL6sg_ZQljLO0zcK0Pxcgg&usqp=CAE",
						"img-vert"   => "https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcRG4rakR2orK4xT8SMQJ6POoY3VlzEPH8DVZFyoT90V-fFCm7r2ff8lkwiKTUZm6VOwkucN6ytYuIVQTtKFN1Rr_HYsveznGL1CdL6sg_ZQljLO0zcK0Pxcgg&usqp=CAE",
						"best"  => "449.99"
					], [ //1
						"name"  => "Xbox Series S",
						"brand"   => "Microsoft",
						"desc"   => "Budget Version",
						"link"  => "https://www.xbox.com/en-GB/consoles/xbox-series-s",
						"img-hori"   => "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQtDAGQNPaZgV2WJ6Dpvf6pTNIqKvJx06fIyI3TQGBPeK2if9YC9T1I3i5QLT5zU4staiqhx-tIzalWgzt3za3X4XSUWczemb7hIiee9mmaH8xO-md1lWks2w&usqp=CAE",
						"img-vert"   => "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQtDAGQNPaZgV2WJ6Dpvf6pTNIqKvJx06fIyI3TQGBPeK2if9YC9T1I3i5QLT5zU4staiqhx-tIzalWgzt3za3X4XSUWczemb7hIiee9mmaH8xO-md1lWks2w&usqp=CAE",
						"best"  => "249.99"
					], [ //1
						"name"  => "Nintendo Switch",
						"brand"   => "Nintendo",
						"desc"   => "OLED Edition",
						"link"  => "https://www.nintendo.com/switch/oled-model/",
						"img-hori"   => "https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcTElLMZBu8dmYV0XosxAII5Pl0vZsJR5YAS2gY8diNxBqB4triw3T5EqFenyC8ogvktIVkLqZBa0eNFpCjb48vUoTmCewP0Ttu_a4m4-5E&usqp=CAE",
						"img-vert"   => "https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcTElLMZBu8dmYV0XosxAII5Pl0vZsJR5YAS2gY8diNxBqB4triw3T5EqFenyC8ogvktIVkLqZBa0eNFpCjb48vUoTmCewP0Ttu_a4m4-5E&usqp=CAE",
						"best"  => "309.99"
					]
				];


				return view('products', [
					"category"    	=> $category,
					"orientation"   => $orientation,
					"products" 		=> $products
				]);
				break;
			case "prebuilds":
				$products = [
					[ //1
						"name"  => "Corsair One i300",
						"specs"   => [
							"cpu" => "i9-12900K",
							"gpu" => "RTX 3080 Ti",
							"ram" => "64GB DDR5"
						],
						"link"  => "#",
						"img-vert"   => "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRNqFRWOu8h_J7f-X1z9KZI9JV4t1cct4rbBSSIw4eBZOgrkHsvN6zARnU8DHWdkgK2Mw8jnfeab0z6AyqanHA0ZVR9PwDimbCOit7ftIMt&usqp=CAE",
						"img-hori"   => "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRNqFRWOu8h_J7f-X1z9KZI9JV4t1cct4rbBSSIw4eBZOgrkHsvN6zARnU8DHWdkgK2Mw8jnfeab0z6AyqanHA0ZVR9PwDimbCOit7ftIMt&usqp=CAE",
						"best"  => "1000"
					],
					[ //2
						"name"  => "Predator Orion 3000",
						"specs"   => [
							"cpu" => "i9-12900K",
							"gpu" => "RTX 3080 Ti",
							"ram" => "64GB DDR5"
						],
						"link"  => "#",
						"img-vert"   => "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcT5kRfCy6guheizFEmG1j85TcnXdVqZHRL8Z6vh_4NthUW9YUPOxmlrXCfutXJS4LpRT6Yqp10au5kfq57nPTCwvMP1OR2tVtO3PJIPikeycSuk96xcOZDNBg&usqp=CAE",
						"img-hori"   => "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcT5kRfCy6guheizFEmG1j85TcnXdVqZHRL8Z6vh_4NthUW9YUPOxmlrXCfutXJS4LpRT6Yqp10au5kfq57nPTCwvMP1OR2tVtO3PJIPikeycSuk96xcOZDNBg&usqp=CAE",
						"best"  => "1000"
					],
					[ //3
						"name"  => "Asus ROG GA15",
						"specs"   => [
							"cpu" => "i9-12900K",
							"gpu" => "RTX 3080 Ti",
							"ram" => "64GB DDR5"
						],
						"link"  => "#",
						"img-vert"   => "https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQnz5dHcTZVb-Tq1OJQ4lPyDz8ACNhS_J_8-GEgRyRoKVzj8NXmT2nbh84sTV51pji3VxHqDcB_kqG3p3OoUbHCcVVXhv9pkJoEwHFMpLyuKLDTtIAyTJiH&usqp=CAE",
						"img-hori"   => "https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQnz5dHcTZVb-Tq1OJQ4lPyDz8ACNhS_J_8-GEgRyRoKVzj8NXmT2nbh84sTV51pji3VxHqDcB_kqG3p3OoUbHCcVVXhv9pkJoEwHFMpLyuKLDTtIAyTJiH&usqp=CAE",
						"best"  => "1000"
					],
					[ //4
						"name"  => "Alienware R12",
						"specs"   => [
							"cpu" => "i9-12900K",
							"gpu" => "RTX 3080 Ti",
							"ram" => "64GB DDR5"
						],
						"link"  => "#",
						"img-vert"   => "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR6YagCY8eQufe6ZjLGl78TCdXtAlAr1KKUxKyNJdz4vpthG3LX_m7YDPF3nAtG0P6Ux72vvExyHesqiS_iibl_KzpHOud6kKLEo8BmREHXev_m0oC-u6BCsg&usqp=CAE",
						"img-hori"   => "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR6YagCY8eQufe6ZjLGl78TCdXtAlAr1KKUxKyNJdz4vpthG3LX_m7YDPF3nAtG0P6Ux72vvExyHesqiS_iibl_KzpHOud6kKLEo8BmREHXev_m0oC-u6BCsg&usqp=CAE",
						"best"  => "1000"
					],
					[ //5
						"name"  => "HP Omen 30L",
						"specs"   => [
							"cpu" => "i9-12900K",
							"gpu" => "RTX 3080 Ti",
							"ram" => "64GB DDR5"
						],
						"link"  => "#",
						"img-vert"   => "https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQ5WIl4yJWQQHCRzNdrdjTcYoBkaMvlZGB1uKxabgyB41eacKWBwYpR4ANiV6-SDCS3GbfY4uJmL4zSkyr3Aki9xDy_KWUsCO72s-dtpoU&usqp=CAE",
						"img-hori"   => "https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQ5WIl4yJWQQHCRzNdrdjTcYoBkaMvlZGB1uKxabgyB41eacKWBwYpR4ANiV6-SDCS3GbfY4uJmL4zSkyr3Aki9xDy_KWUsCO72s-dtpoU&usqp=CAE",
						"best"  => "1000"
					]
				];


				return view('products', [
					"category"    	=> $category,
					"orientation"   => $orientation,
					"products" 		=> $products
				]);
				break;
			default:
				$category = "no dont do that";

				return view('products', [
					"category"    	=> $category,
					"orientation"   => $orientation,
					"products" 		=> Null
				]);
				break;
		}
	}

	public function saved()
	{
		$products = [
			[
				"title" => "ASUS TUF Gaming GeForce RTX™ 3080 Ti OC Edition 12GB GDDR6X",
				"link"  => "https://www.amazon.co.uk/ASUS-GeForce-buffed-up-chart-topping-performance/dp/B095YF4L9W/ref=sr_1_8?crid=19PWXQ3S0M5BV&keywords=3080&qid=1646723576&sprefix=3080%2Caps%2C85&sr=8-8",
				"img"   => "https://m.media-amazon.com/images/I/71F-iS7SfcS._AC_SX679_.jpg",
				"best"  => "1800",
				"avg"   => "1900"
			], [
				"title" => "AMD Ryzen Threadripper 3990X",
				"link"  => "https://www.amazon.co.uk/DANIPEW-AMD-Ryzen-Threadripper-3990X/dp/B0815SBQ9W/ref=sr_1_fkmr1_2?keywords=AMD%20RYZEN%20THREADRIPPER%203990X&qid=1581093524&sr=8-2-fkmr1%0D%0A",
				"img"   => "https://m.media-amazon.com/images/I/711VabzLQ2L._AC_SX679_.jpg",
				"best"  => "3900",
				"avg"   => "4000"
			], [
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
