<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

           

            DB::table('articles')->insert([
                'category_id'=>rand(1,7),
                'title'=>('title'),
                'image'=>'http://hydra2.nazwa.pl/media/galeria_med/big/58.jpg',
                'content'=>'About 1 in 3 British people in their late 40s have chronic health issues, according to new results from the 1970 British Cohort Study, which periodically tracks the lives of about 17,000 people born in England, Scotland, and Wales.',
                'slug'=>Str::slug('title'),
                'created_at'=>now(),
                'updated_at'=>now()

            ]);

           
        }
    }
