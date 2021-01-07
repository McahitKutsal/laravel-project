<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('contacts')->insert([
        'adres'=>'Örnek Mah. Deneme Sk. No:24/8 Ankara',
        'telefon'=>'0.312.444 0532',
      ]);
    }
}
