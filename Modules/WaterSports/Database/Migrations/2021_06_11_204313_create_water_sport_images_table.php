<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterSportImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_sport_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('water_sport_id');
            $table->foreign('water_sport_id')->references('id')->on('water_sports')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_sport_images');
    }
}
