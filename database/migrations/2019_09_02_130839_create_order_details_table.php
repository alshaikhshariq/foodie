<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements   ('order_details_id');
            $table->bigInteger      ('order_id')->unsigned();
            $table->bigInteger      ('food_id')->unsigned();
            $table->Integer         ('order_quantity');
            $table->string          ('special_instructions');
            $table->timestamps();
            $table->foreign('order_id')->references('order_id')
                        ->on('orders')->onDelete('cascade');
            $table->foreign('food_id')->references('id')
                        ->on('foods')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
