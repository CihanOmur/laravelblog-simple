<?php

namespace App\Http\Controllers\Back;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends Controller
{
    public function index(){
        $config=Config::find(1);
        return view('back.config.index', compact('config'));
    }



    public function update(Request $request){

        $config=Config::find(1);
        $config->title=$request->title;
        $config->twitter=$request->twitter;
        $config->facebook=$request->facebook;
        $config->github=$request->github;

          
        if($request->hasFile('logo')){
            $logo=Str::slug($request->title).'-logo.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads'),$logo);
            $config->logo='uploads/'.$logo;
        }


           
        if($request->hasFile('favicon')){
            $favicon=Str::slug($request->title).'-favicon.'.$request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('uploads'),$favicon);
            $config->favicon='uploads/'.$favicon;
        }
          
            $config->save();
            toastr()->success('Successful!', 'The configs was updated successfully.');
            return redirect()->back();
    }
}
