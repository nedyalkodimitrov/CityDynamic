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
            $table->string('name');
            $table->string('model');
            $table->string('seats');
            $table->integer('seats_at_row');
            $table->json('seats_status');
            $table->unsignedBigInteger('company');
            $table->foreign('company')->references('id')->on('companies')
                ->onDelete('cascade');
            $table->unsignedBigInteger('current_location')->nullable();
            $table->foreign('current_location')->references('id')->on('stations')
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
