<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('category_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('seo_title');
            $table->text('meta_description');
            $table->string('image');
            $table->string('gallery');
            $table->integer('new');
            $table->string('sku');
            $table->string('price');
            $table->text('description')->nullable();;
            $table->text('info')->nullable();;
            $table->text('options')->nullable();;
            $table->timestamps();
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
