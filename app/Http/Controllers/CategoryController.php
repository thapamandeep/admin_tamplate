<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;

class CategoryController extends Controller
{
    public function storeCategory(Request $request){
        $data = $request->validate([
            'name'=> 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

          $newImage = "";
if ($request->hasFile('image')) {
    $file = $request->file('image');
    $newImage = time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('gallery', $newImage, 'public');
}

   
        $category = new Category();
        $category->name = $data['name'];
        $category->image = $newImage;

        $category->save();
          
        Session::flash('success','Category has been added');
        return redirect()->back();
    }

    public function editCategory($id){

    $category = Category::find($id);



    return view('pages.category.editCategory',compact('category'));

    }

    public function updateCategory(Request $request, Category $category){

    $data = $request->validate([

    'name'=>'required|string',
    'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    if ($request->hasFile('image')) {
     
        $oldImage = $category->image;

        $file = $request->file('image');
        $newImage = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('gallery', $newImage, 'public');
        $category->image = $newImage;

         }else{
        $category->image = $data['old_image'];
    }
   
    
  
    $category->name = $data->name;

    $category->save();

    
    Session::flash('success', 'Category Updated Successfully');

    return redirect()->route('create.category');
    }

    public function deleteCategory(Category $category){

    $category->delete();

  return redirect()->route('get.categoryTable')->with('success', 'Data has been deleted');
    }
}
