<?php

use App\Http\Controllers\AllProductReturnController;
use App\Http\Controllers\carrerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderBackendController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function(){
    Route::get('/ContuctUs','ContuctUsPage')->name('ContuctUs.page');
    Route::post('/Contuct','Contuct_Insert')->name('contact.insert');
    Route::get('/Shop','Shop')->name('Shop.page');
    Route::post('/review','review')->name('insert.review');
    Route::get('/AboutUs','About_us')->name('About.us');
    Route::get('/Policy','Policy')->name('Policy');
    Route::get('/Product/{slug}','ProductDetails')->name('product.Details');
});
Route::controller(carrerController::class)->group(function (){
   Route::get('/career/On', 'indexFrontend')->name('career.index');
   Route::post('/career/Apply', 'insertApplication')->name('Applicaton.insert');
});

Route::controller(AllProductReturnController::class)->group(function (){
   Route::get('/Accessories', 'Accessories')->name('Accessories.All');
   Route::get('/Motherboard', 'Motherboard')->name('Accessories.Motherboard');
   Route::get('/Webcam', 'Webcam')->name('Accessories.Webcam');
   Route::get('/Ram', 'Ram')->name('Accessories.Ram');
   Route::get('/Harddisk', 'Harddisk')->name('Accessories.Harddisk');
   Route::get('/Pad', 'Pad')->name('Accessories.Pad');
   Route::get('/Monitor', 'Monitor')->name('Accessories.Monitor');
   Route::get('/Multiplug', 'Multiplug')->name('Accessories.Multiplug');
   Route::get('/Pendrive', 'Pendrive')->name('Accessories.Pendrive');
   Route::get('/Mouse', 'Mouse')->name('Accessories.Mouse');
   Route::get('/PSU', 'PSU')->name('Accessories.PSU');
   Route::get('/SSD', 'SSD')->name('Accessories.SSD');
   Route::get('/Processor', 'Processor')->name('Accessories.Processor');
   Route::get('/Adapter', 'Adapter')->name('Accessories.Adapter');
   Route::get('/Keyboard', 'Keyboard')->name('Accessories.Keyboard');
   Route::get('/UPS', 'UPS')->name('Accessories.UPS');
   Route::get('/Cooler', 'Cooler')->name('Accessories.Cooler');
   Route::get('/Casing', 'Casing')->name('Accessories.Casing');
   Route::get('/Desktop', 'Desktop')->name('Desktop');
   Route::get('/Laptop', 'Laptop')->name('Laptop');
   Route::get('/printer', 'printer')->name('printer');
   Route::get('/Scanner', 'Scanner')->name('Scanner');
   Route::get('/Router', 'Router')->name('Router');
   Route::get('/Tablets', 'Tablets')->name('Tablets');
   Route::get('/Sound&System', 'Sound_System')->name('Sound.System');
   Route::get('/Headphone', 'Head_phone')->name('Head.phone');
   Route::get('/DockingStation', 'DockingStation')->name('DockingStation');
   Route::get('/Server', 'Server')->name('Server');
   Route::get('/Projector', 'Projector')->name('Projector');
});
