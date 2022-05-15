<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('confirmations', function (Blueprint $table) {
            $table->id();
            $table->boolean('buyer_confirm')->default(0);
            $table->boolean('seller_confirm')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('confirmations');
    }
};
