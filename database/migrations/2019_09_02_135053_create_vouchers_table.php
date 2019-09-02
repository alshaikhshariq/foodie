<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements   ('id');
            $table->bigInteger      ('restaurant_id')->unsigned();
            $table->string          ('voucher_code');
            $table->boolean         ('is_active')->default('1');
            $table->Integer         ('min_cost');
            $table->enum            ('discount_operation',['%', '-']);
            $table->Integer         ('num_vouchers');
            $table->Integer         ('expiry');
            $table->Integer         ('num_used');
            $table->timestamps();
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
        Schema::dropIfExists('vouchers');
    }
}
