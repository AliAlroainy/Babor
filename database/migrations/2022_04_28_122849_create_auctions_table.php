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
            $table->string('securityDeposit')->nullable();;
            $table->decimal('commission', 5, 2)->nullable();
            $table->decimal('minInc', 5, 2);
            $table->date('closeDate');
            $table->date('startDate');
            $table->integer('startPrice');
            $table->integer('winnerPrice')->nullable();
            $table->string('winner')->nullable();
            $table->integer('desc')->nullable();;
            $table->boolean('status')->default(1);
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
