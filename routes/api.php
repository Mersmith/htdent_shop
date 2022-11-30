<?php

use App\Http\Controllers\Api\SortSliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('sort/sliders', [SortSliderController::class, 'sliders'])->name('api.sort.sliders');