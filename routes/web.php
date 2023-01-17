<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

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

Route::get('/product/{id}', [ProductController::class, 'viewDetail'])->name('product.view');


Route::get('/about-us', function () {
    return view('about-us');
});

Route::prefix('/register')->controller(RegisterController::class)->name('login.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'login')->name('do-login');
});

// Route::middleware(])->group(function () {
    Route::get('/login',[LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
// });

Route::fallback(function(){
    return redirect('/');
});

Route::get('/category/{category}', [CategoryController::class, 'viewCategory'])->name('productCategory');