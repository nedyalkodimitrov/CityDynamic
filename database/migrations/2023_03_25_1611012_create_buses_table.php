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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("model");
            $table->string("seats");
            $table->unsignedBigInteger("busCompany");
            $table->foreign('busCompany')->references('id')->on('bus_companies')
                ->onDelete('cascade');
            $table->unsignedBigInteger("currentStation")->nullable();
            $table->foreign('currentStation')->references('id')->on('bus_stations')
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
        Schema::dropIfExists('machines');
    }
};
