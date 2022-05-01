<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->string('securityDeposit')->nullable();;
            $table->decimal('commission', 10, 2)->nullable();
            $table->decimal('minInc', 10, 2);
            $table->date('closeDate');
            $table->date('startDate');
            $table->decimal('openingBid', 20, 2);
            $table->decimal('reservePrice', 20, 2);
            $table->decimal('winnerPrice', 20, 2)->nullable();
            $table->string('winner')->nullable();
            $table->text('desc')->nullable();;
            $table->text('status')->default('in-progress');
            $table->boolean('is_active')->default(0);
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
