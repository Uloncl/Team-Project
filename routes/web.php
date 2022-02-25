<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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

Route::get('/',         [PagesController::class, 'home']);
Route::get('about',     [PagesController::class, 'about']);
Route::get('project',	[PagesController::class, 'project']);
Route::get('settings',	[PagesController::class, 'settings']);
Route::get('profile',	[PagesController::class, 'profile']);

Route::get('/register',  [RegisterController::class, 'create'] )->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']  )->middleware('guest');
Route::get('/login',     [SessionsController::class, 'create'] )->name('login');
Route::get('/logout',    [SessionsController::class, 'destroy'])->middleware('auth');
Route::post('/sessions', [SessionsController::class, 'store']  )->name('session');

//Auth::routes();

//Route::get('home',     [PagesController::class, 'home']);
