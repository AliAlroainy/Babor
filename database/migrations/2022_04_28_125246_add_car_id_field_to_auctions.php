<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('auctions', function (Blueprint $table) {
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('auctions', function (Blueprint $table) {
            //
        });
    }
};
