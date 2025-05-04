<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('current_stock');
            $table->integer('rating')->default(0);
            $table->longText('information');
            $table->boolean('most_recent')->default(0);
            $table->boolean('published')->default(0);
            $table->decimal('discount', 15, 2)->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->boolean('fav')->default(0)->nullable();
            $table->string('shipping_method');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
