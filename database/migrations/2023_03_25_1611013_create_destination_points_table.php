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
        Schema::create('destination_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("station");
            $table->foreign('station')->references('id')->on('stations')
                ->onDelete('cascade');

            $table->unsignedBigInteger("destination");
            $table->foreign('destination')->references('id')->on('destinations')
                ->onDelete('cascade');
            $table->integer("order");
            $table->double("price");
            $table->double("duration");
            $table->double("distance");
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
        Schema::dropIfExists('destination_points');
    }
};
