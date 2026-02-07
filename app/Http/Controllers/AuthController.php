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
if($user){  // Check if user exists

    if(Hash::check($data['password'], $user->password)){  // Password check

        Auth::login($user);

        // Redirect based on role
        if(Auth::user()->role_id == 3){

            return redirect()->route('get.customer');

        } 
        elseif(Auth::user()->role_id == 1){

            return redirect()->route('get.admin');

        } 
        elseif(Auth::user()->role_id == 2){

            return redirect()->route('get.user');
        }
         else {
            // Unknown role
            Session::flash('error_message','User role not recognized');
            return redirect()->back();
        }

    } else {
        // Password incorrect
        Session::flash('error_message','Password incorrect');
        return redirect()->back();
    }

} else {
    // User not found
    Session::flash('error_message','User not found');
    return redirect()->back();
}

 }


 public function logout(){

   Auth::logout();
   return redirect()->route('get.login');
    }

    public function editUser(User $user){


    $roles = Role::all();
    return view('pages.editUser', compact('user','roles'));
    }

    public function updateUser(Request $request, User $user){

     $data = $request->validate([
      'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    'fullname' => 'required|string',
    'email' => 'required|email|string',
    'password' => 'required|string|confirmed|min:6',
    'role_id' => 'required|exists:roles,id',
  

  ]);

   
  $user->name = $data['fullname'];
  $user->email = $data['email'];
  $user->password = Hash::make($data['password']);
  $user->role_id = $data['role_id'];


  
  if($request->hasFile('image')){
    
  
    $oldImage = $user->image;
    $file = $request->file('image');
    $newImageName = time(). '.' .$file->getClientOriginalExtension();
    $file->storeAs('photos',$newImageName,'public');

       if ($oldImage && file_exists(storage_path('app/public/photos/'.$user->image))) {
            unlink(storage_path('app/public/photos/'.$user->image));
        }
  }
 
  
  $user->save();

    return redirect()->back()->with('success', 'User update successfully');

    }

    public function deleteUser(User $user){

    $user->delete();
    return redirect()->back()->with('success','user data has been delete');
    }

    

}


 
