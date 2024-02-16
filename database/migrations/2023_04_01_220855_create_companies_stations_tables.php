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
        Schema::create('companies_stations_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("company");
            $table->foreign('company')->references('id')->on('companies')
                ->onDelete('cascade');
            $table->unsignedBigInteger("station");
            $table->foreign('station')->references('id')->on('stations')
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
