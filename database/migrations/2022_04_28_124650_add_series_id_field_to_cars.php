<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->foreignId('series_id')->constrained('series')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
};
