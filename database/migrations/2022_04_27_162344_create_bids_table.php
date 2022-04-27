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
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integre('currentPrice');
        
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->constrained()
                  ->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('auction_id');
            $table->foreign('auction_id')->constrained()
                  ->references('id')->on('auctions')
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
        Schema::dropIfExists('bids');
    }
};
