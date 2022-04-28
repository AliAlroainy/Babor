<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('sizOfdamage');
            $table->enum('status',array_keys(['جديدة'=>'مستعملة']));
            $table->string('color');
            $table->integer('model');
            $table->integer('numberOfKillos');
            $table->string('carPosition');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
