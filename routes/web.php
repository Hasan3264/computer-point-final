<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendController::class, 'index'])->name('Front.index');

// home
Route::get('/121Computer/point/desh', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//backend parts  ===============================================================================================


Route::post('/getsubcategory',[ProductController::class,  'getsubcategory'])->middleware(['auth', 'verified']);

//contuct us part =============================================================================================
//  Route::get('/getmassages/all',[HomeController::class, 'allmassage'])->middleware(['auth', 'verified'])->route('allmassage');


require __DIR__.'/auth.php';
require __DIR__.'/Customer.php';
require __DIR__.'/cart.php';
require __DIR__.'/checkout.php';
require __DIR__.'/Coupne.php';
require __DIR__.'/admin.php';
require __DIR__.'/role.php';
require __DIR__.'/category.php';
require __DIR__.'/subcategory.php';
require __DIR__.'/product.php';
require __DIR__.'/banner.php';
require __DIR__.'/order.php';
require __DIR__.'/career.php';
require __DIR__.'/inventory.php';
require __DIR__.'/wishlist.php';
require __DIR__.'/specific.php';
require __DIR__.'/Frontend.php';


// logbyadmintodeshbord
// regbyadmintodeshbord
