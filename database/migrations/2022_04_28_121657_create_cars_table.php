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
            $table->enum('sizOfDamage', array_keys(['لا يوجد', 'سطحي', 'متوسط', 'كبير']))->nullable();
            $table->enum('status', array_keys(['جديدة','مستعملة']))->nullable();
            $table->string('color');
            $table->integer('model');
            $table->integer('numberOfKillos');
            $table->string('thumbnail');
            $table->string('car_images')->nullable();
            $table->text('carPosition');
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
