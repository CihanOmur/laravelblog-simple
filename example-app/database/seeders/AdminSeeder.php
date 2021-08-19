<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([

            'name'=>'Dilan Karataş',
            'email'=>'karatassdilan@gmail.com',
            'password'=>bcrypt(1903),


        ]);
    }
}
