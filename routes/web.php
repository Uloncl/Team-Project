<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',             [PagesController::class, 'home']);
Route::get('about',         [PagesController::class, 'about']);
Route::get('project',	    [PagesController::class, 'project']);
Route::get('tour',	        [PagesController::class, 'tour']);
Route::get('product',	    [PagesController::class, 'product']);
Route::get('features',	    [PagesController::class, 'features']);
Route::get('enterprise',	[PagesController::class, 'enterprise']);
Route::get('support',	    [PagesController::class, 'support']);
Route::get('pricing',	    [PagesController::class, 'pricing']);
Route::get('cart',	        [PagesController::class, 'cart']);

Route::get('/register',             [RegisterController::class, 'create']       )->middleware('guest');
Route::post('/register',            [RegisterController::class, 'store']        )->middleware('guest');
Route::get('/verify',               [VerificationController::class, 'notice']   )->middleware('auth')->name('verification.notice');
Route::get('/verify/{id}/{hash}',   [VerificationController::class, 'verify']   )->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/login',                [LoginController::class, 'create']          )->middleware('guest')->name('login');
Route::get('/logout',               [LoginController::class, 'destroy']         )->middleware('auth')->name('logout');
Route::post('/sessions',            [LoginController::class, 'store']           )->middleware('guest')->name('session');

//Auth::routes();

//Route::get('home',     [PagesController::class, 'home']);
