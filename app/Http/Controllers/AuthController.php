<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
  public function storeUser(Request $request){

 $data = $request->validate([
    'fullname' => 'required|string',
    'email' => 'required|email|string',
    'password' => 'required|string|confirmed|min:8',
  

  ]);
 
  $user = new User();
  $user->name = $data['fullname'];
  $user->email = $data['email'];
  $user->password = Hash::make($data['password']);


  $user->save();

  return redirect()->back();
 


  }

 public function login(Request $request){

$data = $request->validate([
  'email' => 'required|email|string',
  'password' => 'required|string|min:8'
 ]);

$user = User::where('email',$data['email'])->first();

if($user){

if(Hash::check($data['password'],$user->password)){

return redirect()->route('homePage');

}else{

Session::flash('error_message','password incorrect');
return redirect()->back();

}

}else{
  
  Session::flash('error_message','user has not found');
  return redirect()->back();
}

 }
}