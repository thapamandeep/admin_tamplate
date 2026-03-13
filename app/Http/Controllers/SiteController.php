<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;


class SiteController extends Controller
{
 public function home(){

    $categories = Category::all();

    // $products = Product::where('category_id',$categoryId)->get();

    return view('pages.home', compact('categories','products'));
}

    public function table(){
     $allusers = User::all();
    return view('pages.table', compact('allusers'));
    }
    
//     public function form(){
// $categories = Category::all();
//     return view('pages.form',compact('categories'));
//     }

    public function userRegister(){
   $roles = Role::all();
    return view('pages.user.register', compact('roles'));
    }

    public function productsPage(){

    return view('pages.product');
    }

    public function loginPage(){
 
   
    
    return view('pages.login');
    }
public function profile(){
$user = Auth::user();
return view('pages.profile', compact('user'));
}

public function customerPage(){

return view('pages.customer');
}

public function userPage(){

return view('pages.user');
}
   
public function adminPage(){

return view('pages.home');
}

// for form page
public function productForm(){

$categories = Category::all();

// dd($categories);

return view('pages.product.create', compact('categories') );
}

public function category(){

return view('pages.category.create');
}

public function productTable(){
$products = Product::all();
return view('pages.product.index', compact('products'));
}

public function categoryTable(){
$categories = Category::all();
return view('pages.category.index', compact('categories'));
}

 public function frontTamplate(){
    $categories = Category::all();
    $products = Product::all();
       $bestSellingproducts = Product::orderBy('cost','desc')->take(10)->get();                  
 return view('Site.Home.index',compact('products', 'categories','bestSellingproducts'));
}

public function bestSelling(){
    $categories = Category::all(); // optional if you use categories in Blade
    $products = Product::all();    // if your Blade uses $products
    $bestSellingproducts = Product::orderBy('cost','desc')->take(10)->get();

    return view('Site.Home.index', compact('products', 'categories', 'bestSellingproducts'));
}

public function detail(Product $product){

$categories = Category::all();

return view('site.pages.product-detail', compact('product', 'categories'));
}

public function viewProfile(){
$categories = Category::all();
return view('Site.pages.profile',compact('categories'));
}
 

}
