<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderBackendController;


Route::middleware('auth')->controller(OrderBackendController::class)->prefix('/Order')->group(function(){
//order section
Route::get('order', 'order')->name('order.sec');
Route::get('order_position/get/{orderposition_id}', 'order_position')->name('order.position');
Route::delete('order/dle', 'order_Delete')->name('Delete.Order');
Route::delete('orderProduct/dle', 'Product_delete')->name('Delete.OrderProduct');
Route::post('order/Update', 'order_Update')->name('Order.update');
Route::post('quantity/Update', 'Quantity_Update')->name('quantity.update');
Route::post('order/casfd', 'Update_Position')->name('Update.Position');
});
