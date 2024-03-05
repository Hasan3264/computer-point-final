<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bannerController;


Route::middleware('auth')->controller(bannerController::class)->prefix('/Banner')->group(function(){
    Route::get('banner/add',  'banner')->name('add.banner');
    Route::post('banner/added',  'banner_add')->name('banner.insert');
    Route::get('banner/delete/{id}',  'banner_delete')->name('delete.banner');
    Route::get('bannerstatus/change/{banner_id}',  'bannerstatus')->name('bannerstatus.change');
});
