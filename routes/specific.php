<?php

use App\Http\Controllers\SpecificController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->controller(SpecificController::class)->prefix('/Specific')->group(function () {
Route::get('/Specific', 'index')->name('Specific.index');
Route::post('/Specific/Add', 'add_Spacific')->name('add.Spacific');
Route::post('/Specific/Add/Value/add', 'add_specValue')->name('add.specValue');
Route::post('/Specific/Add/Category', 'add_SpacCategory')->name('add.SpacCategory');

});
