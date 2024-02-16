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
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("city");
            $table->foreign('city')->references('id')->on('cities')
                ->onDelete('cascade');
            $table->string('profilePhoto');
            $table->string('contactEmail');
            $table->string('contactPhone');
            $table->string('contactAddress');

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
        Schema::dropIfExists('bus_stations');
    }
};
