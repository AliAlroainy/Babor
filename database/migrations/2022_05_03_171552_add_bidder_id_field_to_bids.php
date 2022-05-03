<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bids', function (Blueprint $table) {
            $table->foreignId('bidder_id')->constrained('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('bids', function (Blueprint $table) {
            //
        });
    }
};
