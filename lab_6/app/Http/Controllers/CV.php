<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CV extends Controller
{
 public function show() {
     return view('cv');
 }
}
