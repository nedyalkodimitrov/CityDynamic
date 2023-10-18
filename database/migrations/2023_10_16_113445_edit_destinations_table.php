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
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropForeign(["startBusStation"]);
            $table->dropColumn("startBusStation");
            $table->dropForeign(["endBusStation"]);
            $table->dropColumn("endBusStation");

            $table->unsignedBigInteger("busStation")->nullable();
            $table->foreign('busStation')->references('id')->on('bus_stations')
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

        Schema::table('destinations', function (Blueprint $table) {
            $table->unsignedBigInteger("startBusStation");
            $table->foreign('startBusStation')->references('id')->on('bus_stations')
                ->onDelete('cascade');
            $table->unsignedBigInteger("endBusStation");
            $table->foreign('endBusStation')->references('id')->on('bus_stations')
                ->onDelete('cascade');
        });


    }
};
