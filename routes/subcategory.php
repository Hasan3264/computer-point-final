<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\subcategorycontroller;


Route::middleware('auth')->controller(subcategorycontroller::class)->prefix('/sub')->group(function(){
   //sub catt
Route::get('/add/sub_catagory', 'index')->name('add.sub_catagory');
Route::post('/subcategory/Insert', 'insertsub')->name('insert.subcategory');
Route::post('/subcategory/update', 'update')->name('update.subcategory');
Route::get('/sub_catagory/edit/{subcategory_id}',  'editsubcat')->name('edit.subcategory');
Route::get('/subcategory/delete/{subcategorydlt_id}', 'subcategory_herd_delete')->name('sub.delete');
});
