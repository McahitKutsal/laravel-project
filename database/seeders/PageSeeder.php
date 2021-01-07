<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $array['title'] = ['Anasayfa','Hakkımızda','Ürünlerimiz','İletişim'];
         for ($i=0; $i <4 ; $i++) {
           DB::table('pages')->insert([
             'title'=>$array['title'][$i],
             'image'=>'https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE2n6Rw?ver=4aa9&q=90&m=6&h=720&w=1280&b=%23FFFFFFFF&f=jpg&o=f&aim=true',
             'slug'=>Str::slug($array['title'][$i]),
             'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.',
             'order'=>$i+1,
           ]);
         }

     }
}
