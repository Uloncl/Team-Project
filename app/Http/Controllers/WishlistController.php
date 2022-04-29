<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function add(Request $request){
        if (DB::table('user_products_mappings')->where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->doesntExist()) {
            DB::table('user_products_mappings')->insert([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'type' => $request->type
            ]);
        }
    }
    
    public function remove(Request $request){
        // ddd($request);
        if (DB::table('user_products_mappings')->where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->exists()) {
            DB::table('user_products_mappings')
                ->where('user_id', Auth::user()->id)
                ->where('product_id', $request->product_id)
                ->delete();
        }
    }
}
