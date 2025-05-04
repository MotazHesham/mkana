<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price', 15, 2);
            $table->decimal('price_with_discount', 15, 2);
            $table->integer('quantity');
            $table->decimal('total_cost', 15, 2);
            $table->timestamps();
        });
    }
}
