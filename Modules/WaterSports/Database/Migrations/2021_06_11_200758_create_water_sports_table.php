<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\WaterSports\Enums\WaterSportStatusEnum;

class CreateWaterSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_sports', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('what_to_expect_description');
            $table->json('water_sport_description');
            $table->json('routes');
            $table->json('slug')->unique();
            $table->enum('status',WaterSportStatusEnum::values());
            $table->string('code');
            $table->string('color');
            $table->string('corporate_company');
            $table->double('corporate_price');
            $table->unsignedInteger('selling_per_hour');
            $table->double('special_price')->default(0);
            $table->unsignedInteger('minimum_booking');
            $table->boolean('apply_vat')->default(false);
            $table->text('location');
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
        Schema::dropIfExists('water_sports');
    }
}
