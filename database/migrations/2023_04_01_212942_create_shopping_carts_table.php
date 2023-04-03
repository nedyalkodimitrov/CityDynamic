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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user");
            $table->foreign('user')->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger("ticket");
            $table->foreign('ticket')->references('id')->on('tickets')
                ->onDelete('cascade');
            $table->unsignedBigInteger("order")->nullable();
            $table->foreign('order')->references('id')->on('orders')
                ->onDelete('cascade');
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
        Schema::dropIfExists('shopping_carts');
    }
};
