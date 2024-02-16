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

            $table->unsignedBigInteger("destination");
            $table->foreign('destination')->references('id')->on('destinations')
                ->onDelete('cascade');

            $table->unsignedBigInteger("bus")->nullable();
            $table->foreign('bus')->references('id')->on('buses')
                ->onDelete('cascade');

            $table->unsignedBigInteger("driver");
            $table->foreign('driver')->references('id')->on('users')
                ->onDelete('cascade');


            $table->unsignedBigInteger("lastPoint");
            $table->foreign('lastPoint')->references('id')->on('destination_points')
                ->onDelete('cascade');


            $table->decimal("currentLatitude");
            $table->decimal("currentLongitude");


            $table->date("date");
            $table->time("startTime");

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
        Schema::dropIfExists('courses');
    }
};
