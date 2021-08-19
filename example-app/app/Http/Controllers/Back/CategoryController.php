<?php

namespace App\Http\Controllers\Back;
use Illuminate\Support\Str; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;




class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('back.categories.index' ,compact('categories'));
    }



    public function create(request $request){
       
        $isExist=Category::whereSlug(Str::slug($request->category))->first();
        if($isExist){
            toastr()->error($request->category,'category exist!');
            return redirect()->back();
        }

        $category=new Category;
        $category->name=$request->category;
        $category->slug=Str::slug($request->category);
        $category->save();
        toastr()->success('Successful!', 'The category was created successfully.');
        return redirect()->back();
       // sadece post dataları görme  print_r($request->post());

        
    }

         
     public function delete($id){


        Category::find($id)->delete();
        toastr()->success('Category Deleted Successfully');
        return redirect()->back();

     }








}
