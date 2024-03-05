<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;


Route::middleware('auth')->controller(InventoryController::class)->prefix('/Inventory')->group(function(){
// //inventory
Route::get('/add/color_size', 'add_color')->name('add.color_size');
Route::get('/color/delete/{color_id}', 'delete_color')->name('color.delete');
Route::get('/size/delete/{size_id}', 'size_delete')->name('size.delete');
Route::post('/color/insert', 'insert_color')->name('insert.color');
Route::post('/size/insert',  'insert_size')->name('insert.size');
Route::get('/inventory/{product_id}', 'inventory')->name('inventory');
Route::post('/inventory/insert', 'insert_ventory')->name('insert.inventory');
//role managemaent
});
