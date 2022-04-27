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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('securityDeposit');
            $table->integer('commission');
            $table->integre('minic');
            $table->timestamp('closeDate');
            $table->timestamp('startingDate');
            $table->integer('startingPrice');
            $table->integer('winnerPrice');
            $table->integer('desc');
            $table->boolean('status')->default(1);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->constrained()
                  ->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->constrained()
                  ->references('id')->on('cars')
                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auctions');
    }
};
