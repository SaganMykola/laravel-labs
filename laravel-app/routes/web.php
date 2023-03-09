<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CV;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/Sagan/cv', [CV::class, 'show']
);
