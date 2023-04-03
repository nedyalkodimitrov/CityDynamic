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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("startBusStation");
            $table->foreign('startBusStation')->references('id')->on('bus_stations')
                ->onDelete('cascade');
            $table->unsignedBigInteger("endBusStation");
            $table->foreign('endBusStation')->references('id')->on('bus_stations')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinations');
    }
};
