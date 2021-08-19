<?php

namespace App\Http\Controllers\Back;

use Illuminate\Support\Str; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;



use App\Models\Category;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {
        $articles=Article::orderBy( 'created_at','ASC')->get();
        return view('back.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Compact methodu ile data view'e gönderildiği zaman değişkenin ismini string olarak yazıldığı zaman algılar.

        $categories=Category::all();
        return view('back.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
        
         'title'=>'min:10',
         'image'=>'required|image'

        ]);
    
        
        // dd($request->post());
        // modeli değişkene atama işlemi

        $article=new Article;
        $article->title=$request->title;
        $article->category_id=$request->category;
        $article->content=$request->content;
        $article->slug=Str::slug($request->title);


        
 if($request->hasFile('image')){

    //resmin adı-resmin uzantısı

    $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
    //dd($imageName);
    
    //resimleri projeye  kaydetme resmin name'i ile beraber
    $request->image->move(public_path('uploads'), $imageName);

    // resmin kaydedileceği yol 1.parametre
    // resmin hangi isimle kaydedileceği 2.parametre

    //resmi veritabanına kaydetme
    $article->image='uploads/'.$imageName;
    }
    $article->save();
    toastr()->success('Successful!', 'The article was created successfully.');
    return redirect()->route('admin.articles.index');

}
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::findOrFail($id);
        $categories=Category::all();
        return view('back.articles.update',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
        
            'title'=>'min:10'
         
   
           ]);

           $article=Article::findOrFail($id);
           $article->title=$request->title;
           $article->category_id=$request->category;
           $article->content=$request->content;
           $article->slug=Str::slug($request->title);
   
   
           
    if($request->hasFile('image')){
       $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
       $request->image->move(public_path('uploads'), $imageName);
       $article->image='uploads/'.$imageName;
       }
       $article->save();
       toastr()->success('Successful!', 'The article was updated successfully.');
       return redirect()->route('admin.articles.index');

       }


       public function switch(Request $request){
        $article=Article::findOrFail($request->id);
        $article->status=$request->statu=="true" ? 1:0 ;
        $article-> save();

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function delete($id){

            Article::find($id)->delete();
            toastr()->success('Article Deleted Successfully');
            return redirect()->route('admin.articles.index');


        }



    public function destroy($id)
    {
        //
    }
}



//// id yakalandı id değişkenine atanarak (html).
// Sonra get methodu ile ilgili route'a fonksiyo yönlendirildi(tekrar id yollandı).
//Sonra console ile ekrana basıldı ilgili data
