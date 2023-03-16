<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CV;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\CommodityController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/Sagan/cv', [CV::class, 'show']
);

Route::resource('/factories', FactoryController::class);

Route::resource('/commodities', CommodityController::class);

