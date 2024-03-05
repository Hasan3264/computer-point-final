<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::middleware('auth')->controller(ProductController::class)->prefix('/Product')->group(function(){
    Route::get('/add/product/132323',  'index')->name('add.product');
    Route::post('/product/insert',  'insert')->name('insert.product');
    Route::get('/add/product/list',  'get_product')->name('add.product_list');
    Route::get('/add/product/edit/{product_id}',  'edit_product_page')->name('edit.product_page');
    Route::post('/product/edit/update',  'edit_product')->name('update.product');
    Route::get('/product/delete/{product_id}',  'product_delete')->name('product.dlt');
 });



