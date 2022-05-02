<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\GamesController;

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

Route::post('/wishlist/add', [WishlistController::class, 'add']);
Route::post('/wishlist/remove', [WishlistController::class, 'remove']);

Route::controller(PagesController::class)->group(function () {
    Route::get('/',        'home')     ->name("home");
    Route::get('about',    'about')    ->name("about");
    Route::get('profile',  'profile')  ->name("profile");
	Route::get('privacy',  'privacy')  ->name("privacy");
    Route::get('settings', 'settings') ->name("settings");
    Route::get('help',     'help')->name("help");
    Route::get('saved',    'saved')    ->name("saved");
});

Route::controller(GamesController::class)->group(function () {
    Route::get('/products/games/{orientation?}',    'games') ->name("games");
    Route::get('/product/games/{product_id}',       'game')  ->name("game");
    Route::post('/search/games',                    'search')->name('search.games');
});

Route::get('/register',             [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register',            [RegisterController::class, 'store'])->middleware('guest');
Route::get('/verify',               [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('/verify/{id}/{hash}',   [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/login',                [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::get('/logout',               [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
Route::post('/sessions',            [LoginController::class, 'store'])->middleware('guest')->name('session');

Route::get('/mail',            [MailController::class, 'sendMail']);
Route::get('/password/forgot', [ForgotPasswordController::class, 'forgot'])->name("password.forgot");
Route::post('/password/update', [ForgotPasswordController::class, 'update'])->name("password.update");

Route::get('/admin', [AdminController::class, 'panel'])->name("admin.panel");
Route::post('/admin', [AdminController::class, 'update'])->name("admin.update");
