<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
	public function home(){
		$products = DB::table('games')->where('type', 'game')->where('banned', false)->where('recommendations', '>', 5000)->inRandomOrder()->limit(20)->get();
		foreach ($products as $key => $product) {
			$creditIDsObj = DB::table('game_credits_mappings')->where('game_id', $product->id)->get('credit_id');
			$creditIDs = [];
			foreach ($creditIDsObj as $c) {
				$creditIDs[] = $c->credit_id;
			}
			Log::info($creditIDs);
			$product->best_price = $product->best_price == '' ? null : substr_replace($product->best_price, '.', strlen($product->best_price) - 2, 0);
			$product->developer = DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'developer')->exists() ? DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'developer')->get()->first()->name : null;
			$product->publisher = DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'publisher')->exists() ? DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'publisher')->get()->first()->name : null;
			$product->header_image = DB::table('game_images')
				->where('game_id', $product->id)
				->where('type', 'header')
				->get()->first()->full;
			if (Auth::check()) {
				$product->wishlist = DB::table('user_products_mappings')
					->where('user_id', Auth::user()->id)
					->where('product_id', $product->id)
					->where('type', 'games')
					->get()
					->first();
			}
		}
		// return $products;
		return view('index', [
			"category"    	=> 'games',
			"orientation"   => 'horizontal',
			"products" 		=> $products
		]);
	}

	public function about(){
		return view('about');
	}


	public function privacy(){
		return view('privacy');
	}

	public function help() {
		return view('help');
	}

	public function profile() {
		return view('profile');
	}

	public function settings(){
		return view('settings');
	}

	public function saved(){
		$product_ids = DB::table('user_products_mappings')
			->where('user_id', Auth::user()->id)
			->get('product_id');

		$product_ids_t = [];

		foreach ($product_ids as $id) {
			$product_ids_t[] = $id->product_id;
		}

		$product_ids = $product_ids_t;

		$products = DB::table('games')->whereIn('id', $product_ids)->paginate(10);

		foreach ($products as $key => $product) {
			$creditIDsObj = DB::table('game_credits_mappings')->where('game_id', $product->id)->get('credit_id');
			$creditIDs = [];
			foreach ($creditIDsObj as $c) {
				$creditIDs[] = $c->credit_id;
			}
			Log::info($creditIDs);
			$product->best_price = $product->best_price == '' ? null : substr_replace($product->best_price, '.', strlen($product->best_price) - 2, 0);
			$product->developer = DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'developer')->exists() ? DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'developer')->get()->first()->name : null;
			$product->publisher = DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'publisher')->exists() ? DB::table('game_credits_definitions')->whereIn('id', $creditIDs)->where('type', 'publisher')->get()->first()->name : null;
			$product->header_image = DB::table('game_images')
				->where('game_id', $product->id)
				->where('type', 'header')
				->get()->first()->full;
			if (Auth::check()) {
				$product->wishlist = DB::table('user_products_mappings')
					->where('user_id', Auth::user()->id)
					->where('product_id', $product->id)
					->where('type', 'games')
					->get()
					->first();
			}
		}

		// dd($products);

		return view('saved', [
			"products" => $products
		]);
	}
}
