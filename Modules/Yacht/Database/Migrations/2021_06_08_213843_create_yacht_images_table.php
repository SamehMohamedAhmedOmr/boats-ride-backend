<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYachtImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yacht_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('yacht_id');
            $table->foreign('yacht_id')->references('id')->on('yachts')->onDelete('cascade');
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
        Schema::dropIfExists('yacht_images');
    }
}
