<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('payment_bills', function (Blueprint $table) {
            $table->foreignId('bid_id')->nullable()->constrained('bids')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('payment_bills', function (Blueprint $table) {
            //
        });
    }
};
