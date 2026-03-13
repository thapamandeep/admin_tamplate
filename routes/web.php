<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
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
Route::get('/login',[SiteController::class,'loginPage'])->name('get.login');
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
  Route::get('/admin',[SiteController::class,'home'])->name('homePage'); 

});

Route::get('/customer',[SiteController::class,'customerPage'])->name('get.customer')->middleware('customer');
Route::get('/user',[SiteController::class,'userPage'])->name('get.user')->middleware('user');
Route::get('/admin',[SiteController::class,'adminPage'])->name('get.admin');
  
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

// ---------------------------------------------//---------------------------------------------//

Route::get('/front',[SiteController::class,'bestSelling'])->name('best.selling');
Route::get('/product-detail/{product}',[SiteController::class,'detail'])->name('get.detail');

Route::get('/forgot-password',[AuthController::claSS,'forgot_password'])->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');


route::get('/reset-password',[AuthController::class,'resetPassword'])->name('reset.password');

Route::post('/reset-password', [AuthController::class, 'updatePassword'])
      ->name('post.reset.password');

  Route::get('/',[SiteController::class,'frontTamplate'])
        ->name('get.front');

  Route::get('/view-profile',[SiteController::class,'viewProfile'])->name('get.viewProfile')->middleware('user');   
  
  Route::get('/contact-us',[AuthController::class,'contactUs'])->name('get.contact');

  Route::post('/contact-store',[AuthController::class,'contact_store'])->name('post.contactus');

  Route::get('/products/{categoryId}', [AuthController::class, 'getProducts'])->name('get.products');

  // --------------------cart--------------------//
  Route::get('/cart/{product}',[CartController::class,'cart'])->name('get.cart')->middleware('user');
  Route::post('/add-to-cart/{product}',[CartController::class,'add'])->name('post.add.cart')->middleware('user');
  Route::get('/cart-collection',[CartController::class,'cartShow'])->name('get.cart.show')->middleware('user');
  Route::get('/delete-cart/{cart}',[CartController::class,'deleteCart'])->name('get.delete.cart')->middleware('user');
  Route::post('/cart-purchase',[CartController::class,'purchaseCart'])->name('post.purchase')->middleware('user');