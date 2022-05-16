<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('confirmations', function (Blueprint $table) {
            $table->foreignId('payment_bill_id')->nullable()->constrained('payment_bills')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('confirmations', function (Blueprint $table) {
            //
        });
    }
};
