<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->integer('sizOfdamage');
            $table->boolean('status')->default(1);
            $table->string('color');
            $table->integer('model');
            $table->integer('numberOfKillos');
            $table->string('carPosition');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->constrained()
                  ->references('id')->on('brands')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->constrained()
                  ->references('id')->on('categories')
                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car');
    }
};
