<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostomerLoginController;



Route::controller(CostomerLoginController::class)->prefix('/Customer')->group(function(){
    Route::post('/login', 'CustomerInput')->name('customer.input');
    Route::post('/update', 'Update_Customer')->name('customer.Update');
    Route::get('/Profile', 'Profile')->name('customer.profile');
    Route::post('/Login', 'LogIN')->name('customer.login');
    Route::get('/Logout', 'Logout')->name('customer.logout');
});
