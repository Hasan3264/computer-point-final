<?php

use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::controller(CheckOutController::class)->prefix('/Checkout')->group(function(){
    Route::get('/checkout','index')->name('check.Out');
    Route::post('/order/insert','insert')->name('order.insert');
    Route::get('/order/success','order_success')->name('order.success');
    Route::get('/order/success','order_success')->name('order.success');
    Route::get('/order/Cancel/{id}','order_Cancel')->name('Order.Cancel');
});

Route::controller(InvoiceController::class)->prefix('Invoice')->group(function(){
    Route::get('invoice/{id}','download_invoice')->name('Invoice.Index');
});
