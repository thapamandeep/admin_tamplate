<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class SiteController extends Controller
{
    public function home(){

    
    return view('pages.home');
    }

    public function table(){
     $allusers = User::all();
    return view('pages.table', compact('allusers'));
    }
    
    public function form(){

    return view('pages.form');
    }

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
   

}
