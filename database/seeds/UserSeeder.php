<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(){
        DB::table("user")->insert([
            'id'=>1,
            'username'=>'admin',
            'password'=>Hash::make("123456"),
            'id_opd'=>null
        ]);
    }
}