<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterSportRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_sport_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('water_sport_id');
            $table->foreign('water_sport_id')->references('id')->on('water_sports')->onDelete('cascade');
            $table->string('name',500);
            $table->string('email');
            $table->string('phone');
            $table->text('message');
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
        Schema::dropIfExists('water_sport_requests');
    }
}
