<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\HomeMiddleware;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\CustomerMiddleware;

// Route::get('/',[HeaderController::class,'header']);


Route::get('/register',[SiteController::class,'userRegister'])->name('get.register');

Route::post('/store-user',[AuthController::class,'storeUser'])->name('store-user');

// products page
Route::get('/products-page',[SiteController::class,'productsPage'])->name('products-page');
Route::post('/products-store',[ProductController::class,'storeProduct'])->name('products-store');

// login page
Route::get('/login-page',[SiteController::class,'loginPage'])->name('get.login');
Route::post('/user-login',[AuthController::class,'login'])->name('post.login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout.page');

// for profile view
Route::get('/profile',[SiteController::class,'profile'])->name('get.profile');

// for middleware
Route::middleware('home')->group(function(){
 
  Route::get('/table',[SiteController::class,'table'])->name('table-show');
  
Route::get('/form',[SiteController::class,'form'])->name('form-show');
});

Route::middleware('role')->group(function(){
Route::get('/',[SiteController::class,'home'])->name('homePage'); 
});

Route::get('/customer',[SiteController::class,'customerPage'])->name('get.customer')->middleware('customer');
Route::get('/user',[SiteController::class,'userPage'])->name('get.user')->middleware('user');
Route::get('/admin',[SiteController::class,'adminPage'])->name('get.admin')->middleware('admin');
  
