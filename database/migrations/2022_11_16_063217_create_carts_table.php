<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('cust_name');
            $table->string('cust_email');
            $table->string('cust_address');
            $table->string('cust_phone');
            $table->string('prod_title');
            $table->string('prod_quantity');
            $table->string('prod_price');
            $table->string('prod_image');
            $table->string('prod_id');
            $table->string('user_id');
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
        Schema::dropIfExists('carts');
    }
};
