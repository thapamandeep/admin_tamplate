<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FronttamplateController extends Controller
{
  public function frontTamplate(){
 return view('Site.Home.index');
}
  
}
