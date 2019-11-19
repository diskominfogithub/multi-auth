<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("opd")->insert([
            'id' => 1,
            'nama_opd' => 'Dinas 1'
        ]);
    }
}
