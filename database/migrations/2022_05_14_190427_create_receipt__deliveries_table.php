<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('receipt_delivery', function (Blueprint $table) {
            $table->id();
            $table->boolean('sell_pay');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receipt_delivery');
    }
};
