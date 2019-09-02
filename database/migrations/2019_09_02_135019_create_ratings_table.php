<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements   ('rating_id');
            $table->bigInteger      ('user_id')->unsigned();
            $table->bigInteger      ('restaurant_id')->unsigned();
            $table->Integer         ('rating');
            $table->timestamps();
            $table->foreign('user_id')->references('id')
                        ->on('users')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')
                        ->on('restaurants')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
