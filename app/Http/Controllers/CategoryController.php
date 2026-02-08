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
        ]);
        $category = new Category();
        $category->name = $data['name'];

        $category->save();
          
        Session::flash('success','Category has been added');
        return redirect()->back();
    }

    public function editCategory($id){

    $category = Category::find($id);



    return view('pages.category.editCategory',compact('category'));

    }

    public function updateCategory(Request $request, $id){
   
     $category = Category::findOrFail($id);
  
    $category->name = $request->name;

    $category->save();

    
    Session::flash('success', 'Category Updated Successfully');

    return redirect()->route('create.category');
    }

    public function deleteCategory(Category $category){

    $category->delete();

  return redirect()->route('get.categoryTable')->with('success', 'Data has been deleted');
    }
}
