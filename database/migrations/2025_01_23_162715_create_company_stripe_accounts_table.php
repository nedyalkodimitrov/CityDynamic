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
        Schema::create('company_stripe_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_account_id')->nullable();
            $table->boolean('is_charges_enabled')->default(false);
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->on('companies')->references('id')
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
        Schema::dropIfExists('company_stripe_accounts');
    }
};
