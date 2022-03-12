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
	public function products($category, $orientation = "horizontal") {
		switch ($category) {
			case "games":
				$products = [
					[//1
						"name"  => "Elden Ring",
						"dev"   => "FromSoftware",
						"pub"   => "FromSoftware",
						"link"  => "https://store.steampowered.com/app/1245620/ELDEN_RING/",
						"img-hori"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/13e02498b2ae3df0c9078db2f9eb9b2d.webp",
						"img-vert"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/e8a2134c849b73bd279caa9f87c94c40.png",
						"best"  => "49.99"
					],[//2
						"name"  => "Cyberpunk 2077",
						"dev"   => "CD PROJEKT RED",
						"pub"   => "CD PROJEKT RED",
						"link"  => "https://www.gog.com/en/game/cyberpunk_2077",
						"img-hori"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/561adbb4e6094bef3c29e38ceb6bd929.png",
						"img-vert"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/32c3d0cdaa575bc25350c7fce4ad91e2.jpg",
						"best"  => "49.99"
					],[//3
						"name"  => "Tetris Effect",
						"dev"   => "Enhance",
						"pub"   => "Enhance",
						"link"  => "https://store.steampowered.com/app/1003590/Tetris_Effect_Connected/",
						"img-hori"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/ec1e28295c9fe4e013bbc4c45e2ed0ea.png",
						"img-vert"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/ec1e28295c9fe4e013bbc4c45e2ed0ea.png",
						"best"  => "49.99"
					],[//4
						"name"  => "God of War",
						"dev"   => "PlayStation PC",
						"pub"   => "PlayStation PC",
						"link"  => "https://store.steampowered.com/app/1593500/God_of_War/",
						"img-hori"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/5855660034a74cfe0e5fc8d57d17f4ac.png",
						"img-vert"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/5855660034a74cfe0e5fc8d57d17f4ac.png",
						"best"  => "39.99"
					],[//5
						"name"  => "GTA V",
						"dev"   => "Rockstar Games",
						"pub"   => "Rockstar Games",
						"link"  => "https://www.epicgames.com/store/en-US/p/grand-theft-auto-v",
						"img-hori"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/43f6943d7a020cdcb8d27aebb9d96221.png",
						"img-vert"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/43f6943d7a020cdcb8d27aebb9d96221.png",
						"best"  => "14.99"
					],[//6
						"name"  => "Arkham Knight",
						"dev"   => "Warner Bros",
						"pub"   => "Warner Bros",
						"link"  => "https://store.steampowered.com/app/208650/Batman_Arkham_Knight/",
						"img-hori"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/0ea50e88822a30ab6cd93ba4a082d614.png",
						"img-vert"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/0ea50e88822a30ab6cd93ba4a082d614.png",
						"best"  => "15.99"
					],[//7
						"name"  => "Sniper Elite v2",
						"dev"   => "Rebellion",
						"pub"   => "Rebellion",
						"link"  => "https://store.steampowered.com/app/63380/Sniper_Elite_V2/",
						"img-hori"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/c9766f9867f5bbe212da9b9c59726cb8.png",
						"img-vert"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/c9766f9867f5bbe212da9b9c59726cb8.png",
						"best"  => "14.99"
					],[//8
						"name"  => "Ghostrunner",
						"dev"   => "505 Games",
						"pub"   => "505 Games",
						"link"  => "https://store.steampowered.com/app/1139900/Ghostrunner/",
						"img-hori"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/2cf297f54a6678a3d0f225a64a2c6db3.png",
						"img-vert"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/2cf297f54a6678a3d0f225a64a2c6db3.png",
						"best"  => "9.99"
					],[//9
						"name"  => "Monster Hunter",
						"dev"   => "CAPCOM",
						"pub"   => "CAPCOM",
						"link"  => "https://store.steampowered.com/app/582010/Monster_Hunter_World/",
						"img-hori"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/36f0052da9cf0f101267b6e7f6629248.jpg",
						"img-vert"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/36f0052da9cf0f101267b6e7f6629248.jpg",
						"best"  => "24.99"
					],[//10
						"name"  => "DOOM Eternal",
						"dev"   => "Bethesda Softworks",
						"pub"   => "Bethesda Softworks",
						"link"  => "https://store.steampowered.com/app/782330/DOOM_Eternal/",
						"img-hori"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/7a37e5ef930630650790791fe509e8dc.png",
						"img-vert"   => "https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/7a37e5ef930630650790791fe509e8dc.png",
						"best"  => "19.99"
					]
				];
				
				
				return view('products', [
					"category"    	=> $category,
					"orientation"   => $orientation,
					"products" 		=> $products
				]);
				break;
			case "components":
				$products = [
					[//1
						"name"  => "NVIDIA GeForce RTX 3090 FE",
						"type"  => "gpu",
						"specs"   => [
							"CUDA cores: 10496",
							"boost clock: 1.7GHz",
							"memory: 24GB"
						],
						"link"  => "#",
						"img-hori"   => "..\img\components\hor-3090.png",
						"img-vert"   => "..\img\components/vert-3090.png",
						"best"  => "2100.00"
					],
					[//2
						"name"  => "NZXT Kraken Z73 AIO Cooler",
						"type"  => "water cooler",
						"specs"   => [
							"pump speed: 10496"
						],
						"link"  => "#",
						"img-hori"   => "..\img\components\hor-cooler.png",
						"img-vert"   => "..\img\components/vert-cooler.png",
						"best"  => "249.99"
					],
					[//3
						"name"  => "Intel Core i9-11900K Desktop Processor",
						"type"  => "cpu",
						"specs"   => [
							"cores: 8",
							"threads: 16",
							"max clock speed: 5.30Ghz"
						],
						"link"  => "#",
						"img-hori"   => "..\img\components\hor-cpu.png",
						"img-vert"   => "..\img\components/vert-cpu.png",
						"best"  => "545.00"
					],
					[//4
						"name"  => "G.SKILL Trident Z RGB Series",
						"type"  => "ram",
						"specs"   => [
							"capacity: 64GB",
							"type: 288-pin DDR4 SDRAM",
							"speed: 3600"
						],
						"link"  => "#",
						"img-hori"   => "..\img\components\hor-ram.png",
						"img-vert"   => "..\img\components/vert-ram.png",
						"best"  => "112.99"
					],
					[//5
						"name"  => "Samsung 980 1 TB Solid State Drive",
						"type"  => "SSD",
						"specs"   => [
							"capacity: 1TB",
							"read speed: 7GB/s",
							"write speed: 5.1GB/s"
						],
						"link"  => "#",
						"img-hori"   => "..\img\components\hor-ssd.png",
						"img-vert"   => "..\img\components/vert-ssd.png",
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
					[//1
						"name"  => "PlayStation 5 Disc",
						"brand"   => "Sony",
						"desc"   => "Disk Edition",
						"link"  => "https://www.playstation.com/en-gb/ps5/",
						"img-hori"   => "../img/consoles-ps5-disc.png",
						"img-vert"   => "../img/consoles-ps5-disc.png",
						"best"  => "449.99"
					],[//1
						"name"  => "PlayStation 5 Digital",
						"brand"   => "Sony",
						"desc"   => "Digital Edition",
						"link"  => "https://www.playstation.com/en-gb/ps5/",
						"img-hori"   => "../img/consoles-ps5-digital.png",
						"img-vert"   => "../img/consoles-ps5-digital.png",
						"best"  => "359.99"
					],[//1
						"name"  => "Xbox Series X",
						"brand"   => "Microsoft",
						"desc"   => "Best Version",
						"link"  => "https://www.xbox.com/en-GB/consoles/xbox-series-x",
						"img-hori"   => "../img/consoles-xbox-series-x.png",
						"img-vert"   => "../img/consoles-xbox-series-x.png",
						"best"  => "449.99"
					],[//1
						"name"  => "Xbox Series S",
						"brand"   => "Microsoft",
						"desc"   => "Budget Version",
						"link"  => "https://www.xbox.com/en-GB/consoles/xbox-series-s",
						"img-hori"   => "../img/consoles-xbox-series-s.png",
						"img-vert"   => "../img/consoles-xbox-series-s.png",
						"best"  => "249.99"
					],[//1
						"name"  => "Nintendo Switch",
						"brand"   => "Nintendo",
						"desc"   => "OLED Edition",
						"link"  => "https://www.nintendo.com/switch/oled-model/",
						"img-hori"   => "../img/consoles-switch-oled.png",
						"img-vert"   => "../img/consoles-switch-oled.png",
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
					[//1
						"name"  => "Corsair One i300",
						"specs"   => [
							"cpu" => "i9-12900K", 
							"gpu" => "RTX 3080 Ti", 
							"ram" => "64GB DDR5"
						],
						"link"  => "#",
						"img-vert"   => "..\img\prebuilds/vert-corsair.png",
						"img-hori"   => "..\img\prebuilds/hor-corsair.png",
						"best"  => "1000"
					],
					[//2
						"name"  => "Predator Orion 3000",
						"specs"   => [
							"cpu" => "i9-12900K", 
							"gpu" => "RTX 3080 Ti", 
							"ram" => "64GB DDR5"
						],
						"link"  => "#",
						"img-vert"   => "..\img\prebuilds/vert-acer.png",
						"img-hori"   => "..\img\prebuilds/hor-acer.png",
						"best"  => "1000"
					],
					[//3
						"name"  => "Asus ROG GA15",
						"specs"   => [
							"cpu" => "i9-12900K", 
							"gpu" => "RTX 3080 Ti", 
							"ram" => "64GB DDR5"
						],
						"link"  => "#",
						"img-vert"   => "..\img\prebuilds/vert-asus.png",
						"img-hori"   => "..\img\prebuilds/hor-asus.png",
						"best"  => "1000"
					],
					[//4
						"name"  => "Alienware R12",
						"specs"   => [
							"cpu" => "i9-12900K", 
							"gpu" => "RTX 3080 Ti", 
							"ram" => "64GB DDR5"
						],
						"link"  => "#",
						"img-vert"   => "..\img\prebuilds/vert-alienware.png",
						"img-hori"   => "..\img\prebuilds/hor-alienware.png",
						"best"  => "1000"
					],
					[//5
						"name"  => "HP Omen 30L",
						"specs"   => [
							"cpu" => "i9-12900K", 
							"gpu" => "RTX 3080 Ti", 
							"ram" => "64GB DDR5"
						],
						"link"  => "#",
						"img-vert"   => "..\img\prebuilds/vert-hp.png",
						"img-hori"   => "..\img\prebuilds/hor-hp.png",
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
