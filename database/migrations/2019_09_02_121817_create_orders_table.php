<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements   ('order_id');
            $table->bigInteger      ('user_id')->unsigned();
            $table->bigInteger      ('restautrant_id')->unsigned();
            $table->enum            ('order_status',
                                    ['delivered',
                                     'pending',
                                     'cancelled']);
            $table->integer         ('order_quantity');
            $table->integer         ('delivery_address');
            $table->boolean         ('is_discounted')->default('0');
            $table->integer         ('total_price');
            $table->string          ('special_instructions');
            $table->timestamps();
            $table->foreign('user_id')->references('id')
                        ->on('users')->onDelete('cascade');
            $table->foreign('restautrant_id')->references('id')
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
        Schema::dropIfExists('orders');
    }
}
