<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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
  
// Route::get('/form',[SiteController::class,'form'])->name('form-show');
});

Route::middleware('role')->group(function(){
Route::get('/',[SiteController::class,'home'])->name('homePage'); 
});

Route::get('/customer',[SiteController::class,'customerPage'])->name('get.customer')->middleware('customer');
Route::get('/user',[SiteController::class,'userPage'])->name('get.user')->middleware('user');
Route::get('/admin',[SiteController::class,'adminPage'])->name('get.admin')->middleware('admin');
  
Route::middleware('admin')->group(function(){
// this is for form of category and product
Route::get('/product-form',[SiteController::class,'productForm'])->name('create.product');
Route::get('/category-form',[SiteController::class,'category'])->name('create.category');
Route::post('/store-product',[ProductController::class,'storeProduct'])->name('store.product');
Route::post('/store-category',[CategoryController::class,'storeCategory'])->name('store.category');

// this for table show
Route::get('/product-table',[SiteController::class,'productTable'])->name('get.productTable');
Route::get('/category-table',[SiteController::class,'categoryTable'])->name('get.categoryTable');

// this for edit
Route::get('/edit-category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
Route::get('/edit-product/{product}',[ProductController::class,'editProduct'])->name('edit.product');
Route::post('/update-category/{id}',[CategoryController::class,'updateCategory'])->name('update.category');
Route::post('/update-product/{product}',[ProductController::class,'updateProduct'])->name('update.product');
Route::get('/edit-user/{user}',[AuthController::class,'editUser'])->name('edit.user');
Route::post('/edit-user/{user}',[AuthController::class,'updateUser'])->name('update.user');

// this for delete
Route::get('/delete-product/{product}',[ProductController::class,'deleteProduct'])->name('delete.product');
Route::get('/delete-category/{category}',[CategoryController::class,'deleteCategory'])->name('delete.category');
Route::get('/delete-user/{user}',[AuthController::class,'deleteUser'])->name('delete.user');
Route::get('/product-show/{product}', [ProductController::class,'show'])->name('detail.product');


});

