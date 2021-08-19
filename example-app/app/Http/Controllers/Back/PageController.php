<?php

namespace App\Http\Controllers\Back;

use Illuminate\Support\Str; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;



class PageController extends Controller
{
    public function index(){

        $pages=Page::all();
        return view('back.pages.index', compact('pages'));
    }

     
    public function create(){

        return view('back.pages.create');
    }
      


    public function update($id){

        $page=Page::findOrFail($id);
        return view('back.pages.update',compact('page'));
    }


      

    public function updatePost(Request $request,$id)
    
    {

        $request->validate([
        
            'title'=>'min:10',
            'image'=>'image'
   
           ]);

       $page=Page::findOrFail($id);
       $page->title=$request->title;
       $page->content=$request->content;
       $page->slug=Str::slug($request->title);


       
if($request->hasFile('image')){
   $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
   $request->image->move(public_path('uploads'), $imageName);
   $page->image='uploads/'.$imageName;
   }
   $page->save();
   toastr()->success('Successful!', 'The page was updated successfully.');
   return redirect()->route('admin.page.index');

        return view('back.pages.update',compact('pages'));
    }



         

        public function delete($id){

            Page::find($id)->delete();
            toastr()->success('Page Deleted Successfuly');
            return redirect()->back();
        }




    public function post(Request $request){


        $request->validate([
        
            'title'=>'min:5',
            'image'=>'required|image'
   
           ]);

           $last=Page::orderBy('order','desc')->first();
   
           $page=new Page;
           $page->title=$request->title;
           $page->content=$request->content;
           $page->order=$last->order+1;
           $page->slug=Str::slug($request->title);
   
   
           
    if($request->hasFile('image')){
   
       //resmin adı-resmin uzantısı
   
       $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
       //dd($imageName);
       
       //resimleri projeye  kaydetme resmin name'i ile beraber
       $request->image->move(public_path('uploads'), $imageName);
   
       // resmin kaydedileceği yol 1.parametre
       // resmin hangi isimle kaydedileceği 2.parametre
   
       //resmi veritabanına kaydetme
       $page->image='uploads/'.$imageName;
       }
       $page->save();
       toastr()->success('Successful!', 'The page was created successfully.');
       return redirect()->route('admin.page.index');
    }

}

