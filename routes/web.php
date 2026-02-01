<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// Route::get('/',[HeaderController::class,'header']);

Route::get('/',[SiteController::class,'home'])->name('homePage');
Route::get('/table',[SiteController::class,'table'])->name('table-show');
Route::get('/form',[SiteController::class,'form'])->name('form-show');
Route::get('/user',[SiteController::class,'userRegister'])->name('user-register-page');

Route::post('/store-user',[AuthController::class,'storeUser'])->name('store-user');

// products page
Route::get('/products-page',[SiteController::class,'productsPage'])->name('products-page');
Route::post('/products-store',[ProductController::class,'storeProduct'])->name('products-store');

// login page
Route::get('/login-page',[SiteController::class,'loginPage'])->name('get.login');
Route::post('/user-login',[AuthController::class,'login'])->name('post.login');