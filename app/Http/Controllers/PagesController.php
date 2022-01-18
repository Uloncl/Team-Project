<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public funtion index() {
      return view('welcome');
    }
}
