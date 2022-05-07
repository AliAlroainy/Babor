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
            $table->string('securityDeposit')->nullable();
            $table->decimal('commission', 10, 2)->nullable();
            $table->decimal('minInc', 10, 2);
            $table->date('closeDate');
            $table->date('startDate')->nullable();
            $table->decimal('openingBid', 10, 2);
            $table->decimal('reservePrice', 20, 2);
            $table->decimal('winnerPrice', 20, 2)->nullable();
            $table->string('winner')->nullable();
            $table->text('desc')->nullable();
            $table->enum('status', array_keys(['معلقة', 'مرفوضة', 'جارية', 'ملغاة', 'غير مكتملة', 'مكتملة']))->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('auctions');
    }
};
