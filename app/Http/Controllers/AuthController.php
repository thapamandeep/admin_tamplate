<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
  public function storeUser(Request $request){

 $data = $request->validate([
      'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    'fullname' => 'required|string',
    'email' => 'required|email|string',
    'password' => 'required|string|confirmed|min:6',
    'role_id' => 'required|exists:roles,id',
  

  ]);



  $newImageName = "";
  if($request->hasFile('image')){
    $file = $request->file('image');
    $newImageName = time(). '.' .$file->getClientOriginalExtension();
    $file->storeAs('photos',$newImageName,'public');
  }
 
  
  $user = new User();
  $user->image = $newImageName;
  $user->name = $data['fullname'];
  $user->email = $data['email'];
  $user->password = Hash::make($data['password']);
  $user->role_id = $data['role_id'];



  $user->save();

    return redirect()->back()->with('success', 'User registered successfully');
 


  }

 public function login(Request $request){

$data = $request->validate([
  'email' => 'required|email|string',
  'password' => 'required|string|min:6'
 ]);

$user = User::where('email',$data['email'])->first();

if($user){

if(Hash::check($data['password'],$user->password)){

Auth::login($user);

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
  public function logout(){

   Auth::logout();
   return redirect()->route('get.login');
    }
}