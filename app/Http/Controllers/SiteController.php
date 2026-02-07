<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Product;


class SiteController extends Controller
{
    public function home(){

    
    return view('pages.home');
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
    return view('pages.register', compact('roles'));
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

return view('pages.form', compact('categories') );
}

public function category(){

return view('pages.category');
}

public function productTable(){
$products = Product::all();
return view('pages.productTable', compact('products'));
}

public function categoryTable(){
$categories = Category::all();
return view('pages.categoryTable', compact('categories'));
}

}
