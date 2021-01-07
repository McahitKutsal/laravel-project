<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products', function (Blueprint $table) {
          $table->id();
          $table->foreignId('category_id')->constrained()->on('categories')->onDelete('cascade');
          $table->string('title');
          $table->string('image');
          $table->longText('content');
          $table->longText('content2');
          $table->longText('content3');
          $table->longText('content4');
          $table->string('slug');
          $table->float('price');
          $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
          $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
