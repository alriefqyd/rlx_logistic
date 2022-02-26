<?php

use App\Models\Delivery;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about',[\App\Http\Controllers\HomeController::class, 'about']);
Route::get('/cek-resi',[\App\Http\Controllers\HomeController::class, 'cekResi']);
Route::get('/getLocation',[\App\Http\Controllers\AdminDeliveryController::class,'getLocation']);
Route::get('/getPrice',[\App\Http\Controllers\AdminPriceController::class,'getPriceByLocation']);
Route::get('/print', function (){
    return view('welcome');
});
Route::get('/track',[\App\Http\Controllers\TrackResiController::class, 'search']);
Route::get('/delivery/getDataDelivery', [\App\Http\Controllers\AdminDeliveryController::class, 'getDataDelivery'])->middleware('auth');


Route::prefix('admin')->group(function () {
    Route::get('/delivery/print-resi/{delivery:id}',[\App\Http\Controllers\AdminDeliveryController::class,'printResi']);
    Route::get('/home', [\App\Http\Controllers\AdminHomeController::class,'index'])->middleware('auth');
    Route::get('/delivery/export',[\App\Http\Controllers\AdminDeliveryController::class,'export'])->middleware(['auth']);
    Route::get('/page/about',[\App\Http\Controllers\AdminPageController::class, 'detail']);
    Route::get('/page/home',[\App\Http\Controllers\AdminPageController::class, 'detail'])->middleware(['auth']);
    Route::put('/page/home',[\App\Http\Controllers\AdminPageController::class, 'store'])->middleware(['auth']);

    Route::resource('/delivery', \App\Http\Controllers\AdminDeliveryController::class)->middleware('auth');
    //Route::get('/users/{user::username}', [UserController::class, 'show']); //route binding model untuk get berdasarkan username dari url
    Route::get('/prices/corporate/', [\App\Http\Controllers\AdminPriceController::class, 'corporate'])->middleware('auth');
    Route::get('/prices/corporate/create', [\App\Http\Controllers\AdminPriceController::class, 'create'])->middleware('auth');
    Route::post('/prices/corporate/store', [\App\Http\Controllers\AdminPriceController::class, 'store'])->middleware('auth');
    Route::get('/prices/corporate/{price:id}', [\App\Http\Controllers\AdminPriceController::class, 'show'])->middleware('auth');
    Route::put('/prices/corporate/{price:id}', [\App\Http\Controllers\AdminPriceController::class, 'update'])->middleware('auth');

    Route::post('/prices/regular/store', [\App\Http\Controllers\AdminPriceController::class, 'store'])->middleware('auth');
    Route::get('/prices/regular/create', [\App\Http\Controllers\AdminPriceController::class, 'create'])->middleware('auth');
    Route::get('/prices/regular/{price}', [\App\Http\Controllers\AdminPriceController::class, 'show'])->middleware('auth');
    Route::get('/prices/regular/', [\App\Http\Controllers\AdminPriceController::class, 'regular'])->middleware('auth');
    Route::put('/prices/regular/{price:id}', [\App\Http\Controllers\AdminPriceController::class, 'update'])->middleware('auth');

    Route::get('/login', [\App\Http\Controllers\LoginController::class,'index'])->name('login')->middleware('guest');
    Route::post('/authenticate', [\App\Http\Controllers\LoginController::class,'authenticate']);
    Route::post('/logout', [\App\Http\Controllers\LoginController::class,'logout']);

    Route::resource('/users', \App\Http\Controllers\UserController::class)->middleware('auth');
    Route::resource('/layanan', \App\Http\Controllers\AdminLayananController::class)->middleware('auth');
});
