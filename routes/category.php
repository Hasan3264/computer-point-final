<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\catcontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//users/
Route::middleware('auth')->controller(catcontroller::class)->prefix('/cat')->group(function(){
    Route::get('/catagory',  'index')->name('add.catagory');
    Route::post('/category/insert','insert')->name('insert.catagory');
    Route::get('/category/softdelete/{categorysoftdlt_id}', 'catagory_soft_delete')->name('cat.softdelete');
    Route::get('/category/delete/{categorydlt_id}', 'catagory_herd_delete')->name('cat.delete');
    Route::get('/category/edit/{categoryedit_id}', 'catagory_edit')->name('cat.edit');
    Route::post('/category/edit',  'edit')->name('update.Cat');
    Route::get('/category/restore/{restore_id}', 'restore')-> name('cat.restore');
    Route::post('/mark/delete', 'mark_delete')->name('mark.delete');
    Route::post('/mark/restoreall',  'mark_restore')->name('mart.restoreall');
});
