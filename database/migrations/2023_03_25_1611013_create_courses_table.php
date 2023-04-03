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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger("destination");
            $table->foreign('destination')->references('id')->on('destinations')
                ->onDelete('cascade');

            $table->unsignedBigInteger("bus");
            $table->foreign('bus')->references('id')->on('buses')
                ->onDelete('cascade');

            $table->string("currentLocation");
            $table->date("date");
            $table->time("startTime");
            $table->time("endTime");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
