<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements   ('id');
            $table->string          ('title');
            $table->string          ('email')->unique();
            $table->string          ('contact')->unique();
            $table->string          ('password');
            $table->string          ('description',1500);
            $table->integer         ('minimum_order');
            $table->integer         ('delivery_fee');
            $table->string          ('delivery_time');
            $table->string          ('open_time');
            $table->enum            ('is_type',
                                    ['featured',
                                     'normal']);
            $table->string          ('close_time');
            $table->string          ('image_path');
            $table->string          ('image_name');
            $table->string          ('badge')->nullable();
            $table->double          ('latitude');
            $table->double          ('longitude');
            $table->boolean         ('isblock')->default('0');
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
        Schema::dropIfExists('restaurants');
    }
}
