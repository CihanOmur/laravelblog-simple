<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        $pages=['About Us','Career','Our Vision','Our Mission'];
        $count=0;
        foreach($pages as $page){
            $count++;
            DB::table('pages')->insert([
             'image'=>'https://www.mind-your-business.net/media/images/i.a.mind-your-business-01-large.jpg',
             'title'=>$page,
             'slug'=>Str::slug($page),
             'content'=>'Etc News is an independent initiative that offers a content platform on various categories and conducts and promotes high-quality research on its future.',
              'order'=>$count,
             'created_at'=>now(),
             'updated_at'=>now()
             

            ]); 
        }
    }
}
