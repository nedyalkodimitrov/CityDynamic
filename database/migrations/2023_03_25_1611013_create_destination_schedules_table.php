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
        Schema::create('destination_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("destination");
            $table->foreign('destination')->references('id')->on('destinations')
                ->onDelete('cascade');
            $table->double("price");
            $table->time("hour");
            $table->unsignedBigInteger("bus");
            $table->foreign('bus')->references('id')->on('buses')
                ->onDelete('cascade');
            $table->unsignedBigInteger("driver");
            $table->foreign('driver')->references('id')->on('company_employees')
                ->onDelete('cascade');
            $table->boolean("isRepeatable");
            $table->json("days");
            $table->json("weekDays");
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
        Schema::dropIfExists('destination_schedules');
    }
};
