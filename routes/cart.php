<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::controller(CartController::class)->prefix('/Cart')->group(function(){
    Route::get('/Insert/{id}','cart_insert')->name('add.cart');
    Route::delete('/Delete','cart_remove')->name('Delete.cart');
    Route::get('/Index','Index' )->name('Cart.index');
    Route::post('/Update','Update_cart' )->name('cart.update');
    Route::get('/Coupne/check','C_Coupne' )->name('coupne.Check');
    // Route::get('/Product/Details/{id}','ProductDetails')->name('product.Details');
});
