<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
   
    return view('pages.register');
    }

    public function productsPage(){

    return view('pages.product');
    }

    public function loginPage(){

    return view('pages.login');
    }

}
