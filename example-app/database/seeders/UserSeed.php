<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    
    {


        $category=['Notebooks','Laptop','Phones'];
         

        // faker kütüphanesinden veri eklemek için döngü oluşturma
        $faker=Faker::create();
        for($i=0;$i<=20;$i++)


        foreach($category as $cat)
        {
            DB::table('users')->Insert([
                'name'=>$cat,
                'email'=>"karatassdilan@gmail.com",
                'password'=>md5('1903'),
        ]);
    }
    }
}

 // SEED KULLANIMI İÇİN ÖNCE DATABASE/SEED KLASÖRÜNDE TANIMLAMAK GEREKİR.
     // FAKER(VERİ)KÜTÜPHANESİ DAHİL EDİLMELİ
     // VENDOR KLASÖRÜNDE MEVCUT 
     // USE Faker\Factory as Faker; tanımla 
     