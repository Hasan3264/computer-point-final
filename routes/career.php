<?php

use App\Http\Controllers\carrerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::controller(carrerController::class)->group(function(){
    Route::get('/career/index','index')->name('add.career');
    Route::post('/career/post','InputCareer')->name('input.career');
    Route::post('/updateCareer','UpdateCareer')->name('update.career');
    Route::get('/delete/career/{id}','Delete_career')->name('delete.carrer');
    Route::get('/edit/career/{id}','Edit_career')->name('edit.carrer');
    Route::get('applicante/index','applicante_index')->name('applicante.index');
    Route::get('applicante/download/{id}','cv_download')->name('cv.download');
    Route::get('applicante/del/{id}','del_app')->name('del.app');
});
