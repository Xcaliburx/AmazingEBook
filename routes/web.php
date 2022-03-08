<?php

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

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('guest');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->middleware('guest');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
    Route::post('/rent/{id}', [App\Http\Controllers\CartController::class, 'rent'])->name('rent');

    Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');
    Route::delete('/cart/delete/{id}', [App\Http\Controllers\CartController::class, 'delete']);
    Route::delete('/cart/submit', [App\Http\Controllers\CartController::class, 'submit']);
    Route::get('/success', [App\Http\Controllers\CartController::class, 'success']);

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
    Route::patch('/profile/update', [App\Http\Controllers\ProfileController::class, 'update']);
    Route::get('/saved', [App\Http\Controllers\ProfileController::class, 'saved']);

    Route::middleware('isadmin')->group(function(){
        Route::get('/account', [App\Http\Controllers\AccountController::class, 'account'])->name('account');
        Route::get('/account/role/{id}', [App\Http\Controllers\AccountController::class, 'changeRole'])->name('changerole');
        Route::patch('/account/update/{id}', [App\Http\Controllers\AccountController::class, 'updateRole']);
        Route::delete('/account/delete/{id}', [App\Http\Controllers\AccountController::class, 'delete']);
    });
});
