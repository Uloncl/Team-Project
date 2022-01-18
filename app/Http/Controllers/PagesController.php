<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function welcome() {
      return view('welcome');
    }
    public function home() {
      return view('main.index');
    }
    public function about() {
      return view('main.about');
    }
    public function projects() {
      return view('main.projects');
    }
}
