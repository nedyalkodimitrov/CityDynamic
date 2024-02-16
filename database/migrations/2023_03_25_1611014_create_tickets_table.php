<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user");
            $table->foreign('user')->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger("course");
            $table->foreign('course')->references('id')->on('courses')
                ->onDelete('cascade');

            $table->unsignedBigInteger("startPoint");
            $table->foreign('startPoint')->references('id')->on('destination_points')
                ->onDelete('cascade');

            $table->unsignedBigInteger("endPoint");
            $table->foreign('endPoint')->references('id')->on('destination_points')
                ->onDelete('cascade');

            $table->unsignedBigInteger("order")->nullable();
            $table->foreign('order')->references('id')->on('orders')
                ->onDelete('cascade');

            $table->boolean("isPaid")->default(false);
            $table->boolean("isInCart")->default(true);

            $table->double("price");


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
        Schema::dropIfExists('tickets');
    }
};
