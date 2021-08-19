<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Controller;
use Validator;
use Mail;


/* MODELS*/
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\Contact;


class HomeController extends Controller
{


  public function __construct(){
   
    view()->share('pages',Page::orderBy('order','ASC')->get());
    view()->share('categories',Category::inRandomOrder()->get());
  }




    public function index(){

        $data['articles']=Article::orderBy('created_at','DESC')->paginate(1);
        
        return view('front.layouts.homepage',$data);
     }

        public function single($category,$slug,$title){

        $category=Category::whereSlug($category)->first()?? abort(403,'No such category was found');

        $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first()??abort(403,'No such article was found.');

        $article->increment('hit');

        $data['article']=$article;

         return view ('front.layouts.single', $data);
         }


        public function category($slug){

        $category=Category::whereSlug($slug)->first()?? abort(403,'No such category was found');

        $data['category']=$category;

        $data['articles']=Article::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(2);
      
        return view('front.layouts.category',$data);

      }

      public function page($slug){
        
        $page=Page::whereSlug($slug)->first()?? abort(403,'No such page was found');

        $data['page']=$page;

        return view('front.layouts.page',$data);

      }

    public function contact(){

      return view('front.layouts.contact');
    }



    public function contactPost(Request $request){
      //dd($_POST);

      $rules=[

        'name'=>'required|min:5',
        'email'=>'required|email',
        'topic'=>'required',
        'message'=>'required|min:10'  
      ];

      $validate= Validator::make($request->post(),$rules);

      if($validate->fails()){
       return redirect()->route('contact')->withErrors($validate)->withInput();
      }


       Mail::raw('Mesajı Gönderen : '.$request->name.'<br/>
                  Mesajı Gönderen Mail :'.$request->email.'<br/>
                  Mesaj Konusu : '.$request->topic.'<br/>
                  Mesaj : '.$request->message.'<br /><br/>
                  Mesaj Gönderilme Tarihi : '.$request->created_at.''  , function($message) use ($request){
         
        $message->from('iletisim@blogsitesi.com','Blog Sitesi');
        $message->to('karatassdilan@gmail.com');
        $message->subject($request->name.'letişimden mesaj gönderildi');

       });
       
       



      
     // $contact= new contact;
      //$contact->name=$request->name;
      //$contact->email=$request->email;
     // $contact->topic=$request->topic;
     //  $contact->message=$request->message;
    //  $contact->save();
       return redirect()->back()->with('succes','your message has been sent');
       }
    
    }
  
   


/* tablo adı - model adı*/


