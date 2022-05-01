<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    public function games($orientation = "horizontal")
    {
        $pre_products = Game::query()
                        ->where('type', 'game')
                        ->where('banned', false)
                        ->orderBy('recommendations', 'desc')
                        ->get();
        $titles = [];
        $product_ids = [];
        foreach ($pre_products as $key => $product) {
            if (in_array($product->title, $titles)) {
                $pre_products->forget($key);
            } else {
                $titles[] = $product->title;
                $product_ids[] = $product->id;
            }
        }
        $products = Game::query()
                        ->wherein('id', $product_ids)
                        ->orderBy('recommendations', 'desc')
                        ->paginate(20);
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
        return view('products', [
            "category"        => 'games',
            "orientation"   => $orientation,
            "products"         => $products
        ]);
    }
    public function game($product_id)
    {
        $product = DB::table('games')->where('id', $product_id)->get()->first();
        $product->about = str_replace('<img', '<hr class="my-3 solid"> <img class="w-100"', $product->about);
        $product->about = str_replace('bb_tag', 'text-primary mt-3', $product->about);
        $product->about = str_replace('h2', 'h5', $product->about);
        $product->about = str_replace('<br>', '', $product->about);
        $product->about = str_replace('<p></p>', '', $product->about);
        $spec_remove_arr = array('<h2 class="bb_tag">', '<strong>', '</strong>', '</h2>', '<br>', 'RECOMMENDED', 'REQUIRED', ' class="bb_ul"', 'Recommended:', 'Minimum:');
        $product->pc_recommended = str_replace($spec_remove_arr, '', $product->pc_recommended);
        $product->pc_minimum = str_replace($spec_remove_arr, '', $product->pc_minimum);
        $product->linux_recommended = str_replace($spec_remove_arr, '', $product->linux_recommended);
        $product->linux_minimum = str_replace($spec_remove_arr, '', $product->linux_minimum);
        $product->mac_recommended = str_replace($spec_remove_arr, '', $product->mac_recommended);
        $product->mac_minimum = str_replace($spec_remove_arr, '', $product->mac_minimum);
        $children = DB::table('games')->where('parent_game_id', $product->steam_id)->get();
        $product->children = [];
        foreach ($children as $child) {
            $child->header_image = DB::table('game_images')->where('game_id', $child->id)->where('type', 'header')->get('full')->first();
            $child->best_price = $child->best_price == '' ? null : substr_replace($child->best_price, '.', strlen($child->best_price) - 2, 0);
            $product->children[] = $child;
        }
        $product->header_image = DB::table('game_images')->where('game_id', $product_id)->where('type', 'header')->get('full')->first();
        $product->promo = DB::table('game_videos')->where('game_id', $product_id)->get(['name', 'thumbnail', 'video_max']);
        foreach ($product->promo as $promo) {
            $promo->type = 'video';
        }
        $product->promo = $product->promo->concat(DB::table('game_images')->where('game_id', $product_id)->where('type', 'thumbnail')->get(['type', 'full']));
        $tag_ids_obj = DB::table('game_tags_mappings')->where('game_id', $product_id)->get('tag_id');
        $tag_ids = [];
        foreach ($tag_ids_obj as $tag_id) {
            $tag_ids[] = $tag_id->tag_id;
        }
        $product->tag_categories = DB::table('game_tags_definitions')->wherein('id', $tag_ids)->where('type', 'category')->get(['name', 'type']);
        $product->genres = DB::table('game_tags_definitions')->wherein('id', $tag_ids)->where('type', 'genre')->get(['name', 'type']);
        $credit_ids_obj = DB::table('game_credits_mappings')->where('game_id', $product_id)->get('credit_id');
        $credit_ids = [];
        foreach ($credit_ids_obj as $credit_id) {
            $credit_ids[] = $credit_id->credit_id;
        }
        $product->developer = DB::table('game_credits_definitions')->wherein('id', $credit_ids)->where('type', 'developer')->get('name')->first();
        $product->publisher = DB::table('game_credits_definitions')->wherein('id', $credit_ids)->where('type', 'publisher')->get('name')->first();
        $packages = DB::table('game_packages')->where('game_id', $product->id)->get();
        $product->packages = [];
        foreach ($packages as $package) {
            $package->price = $package->price == '' ? null : substr_replace($package->price, '.', strlen($package->price) - 2, 0);
            $package->option_text = str_ends_with($package->option_text, '€') ? str_replace(array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0', ',', '£', '€', '$', '-'), '', $package->option_text) : $package->option_text;
            $package->option_description = $package->option_description == '' ? null : strip_tags($package->option_description);
            $product->packages[] = $package;
        }
        // dd($product);
        return view('product', [
            'product' => $product,
            'category' => 'games'
        ]);
    }
    public function search(Request $request)
    {
        $query = $request->fname;

        $pre_products = Game::query()
            ->where('banned', false)->where('type', 'game')
            ->where('title', 'like', '%' . $query . '%')
            ->orderByRaw('title like ? desc', $query)
            ->orderByRaw('instr(title,?) asc', $query)
            ->orderBy('title')
            ->get();
        $titles = [];
        $product_ids = [];
        foreach ($pre_products as $key => $product) {
            if (in_array($product->title, $titles)) {
                $pre_products->forget($key);
            } else {
                $titles[] = $product->title;
                $product_ids[] = $product->id;
            }
        }
        $products = Game::query()
                        ->wherein('id', $product_ids)
                        ->orderByRaw('title like ? desc', $query)
                        ->orderByRaw('instr(title,?) asc', $query)
                        ->orderBy('title')
                        ->paginate(20);
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
        return view('products', [
            "category"        => 'games',
            "orientation"   => 'horizontal',
            "products"         => $products
        ]);
    }
}
