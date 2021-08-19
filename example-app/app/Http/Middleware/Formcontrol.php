<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Formcontrol
{


    
    public function handle(Request $request, Closure $next)

    {
        if($request->Text=="apple")
        {
            return redirect()->back();
        }
        
        return $next($request);

        }

    
   }
