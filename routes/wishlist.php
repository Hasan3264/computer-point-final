<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;

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
Route::controller(WishlistController::class)->group(function(){
    Route::post('/wishlist/add/','wishlist')->name('addwishlist.cart');
    Route::get('/wishlist','wishlist_show')->name('wishlist.show');
    Route::post('/wishlistCart','wishlist_addtoCart')->name('add.cartFromWish');
});
