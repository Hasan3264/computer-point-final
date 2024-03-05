<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::middleware('auth')->controller(HomeController::class)->prefix('/admin')->group(function(){
Route::get('/users','users')->name('users');
Route::get('/users/userdetails', 'usersdetails')->name('usersdetails');
Route::get('/users/delete/{user_id}','user_delete')->name('user.delete');
Route::post('/name/update', 'updatename')->name('update.name');
Route::post('/password/update','update_pass')->name('update.password');
Route::post('/photo/update', 'photo_update')->name('photo.update');
});
