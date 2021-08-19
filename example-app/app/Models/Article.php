<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* her içeriğin bir kategori id'i ile her kategori tablosunun id'si ile ilişkisi var.*/
/* her yazının bir kategorisi var*/

class Article extends Model
{
    function getCategory(){
     return $this->hasOne('App\Models\Category','id','category_id');
    }
}

