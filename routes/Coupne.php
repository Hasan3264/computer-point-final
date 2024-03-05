<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuponController;

Route::controller(CuponController::class)->prefix('/In')->group(function(){
    Route::post('/Brands/in', 'Brandsinput')->name('add.brand');
    Route::get('/Brands', 'brand_index')->name('brand');
    Route::get('/Get/massage', 'massage_index')->name('allmassage');
    Route::get('/del/massage/{id}', 'del_massage')->name('del.massage');
});
