<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

         for ($i=0; $i <24 ; $i++) {
           DB::table('products')->insert([
             'category_id'=>rand(1,6),
             'title'=>'Item '.$i,
             'price'=>9.99,
             'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.!',
             'content2'=>'Lorem ipsum dolor squam aspernatur Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.!',
             'content3'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.!',
             'content4'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.!',
             'image'=>"http://placehold.it/700x400",
             'slug'=>Str::slug('Item '.$i),
           ]);
         }
     }
}
