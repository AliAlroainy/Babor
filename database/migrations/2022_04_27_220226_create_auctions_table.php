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

            $table->string('securityDeposit');
            $table->integer('commission');
            $table->integer('minic');
            $table->date('closeDate');
            $table->date('startingDate');
            $table->integer('startingPrice');
            $table->integer('winnerPrice')->nullable();
            $table->string('winner')->nullable();
            $table->integer('desc');
            $table->boolean('status')->default(1);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->constrained()
                  ->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->boolean('is_active')->default(0);
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->constrained()
                  ->references('id')->on('car')
                  ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('auctions');
    }
};
