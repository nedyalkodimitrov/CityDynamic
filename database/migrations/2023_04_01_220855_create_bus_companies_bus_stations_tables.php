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
        Schema::create('bus_companies_bus_stations_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("bus_company");
            $table->foreign('bus_company')->references('id')->on('bus_companies')
                ->onDelete('cascade');
            $table->unsignedBigInteger("bus_station");
            $table->foreign('bus_station')->references('id')->on('bus_stations')
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
        Schema::dropIfExists('bus_companies_bus_stations_tables');
    }
};
