<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->bigIncrements   ('food_id');
            $table->bigInteger      ('category_id')->unsigned();
            $table->bigInteger      ('restaurant_id')->unsigned();
            $table->string          ('food_title');
            $table->integer          ('food_price');
            $table->boolean         ('is_customized')->default('0');
            $table->json            ('meta_data');
            $table->timestamps();
            $table->foreign('category_id')->references('category_id')
                        ->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('foods');
    }
}
