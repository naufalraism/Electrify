<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'viewDetail'])->name('product.view');

Route::get('/categories', function () {
    return view('categories');
});
//Route::get('/categories', [Controller::class, 'showCategories']);

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::fallback(function(){
    return redirect('/');
});
