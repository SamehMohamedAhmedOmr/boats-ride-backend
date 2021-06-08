<?php

use Modules\Yacht\Enums\FuelTypeEnum;
use Modules\Yacht\Enums\HullTypeEnum;
use Illuminate\Support\Facades\Schema;
use Modules\Yacht\Enums\YachtTypeEnum;
use Modules\Yacht\Enums\EngineTypeEnum;
use Modules\Yacht\Enums\YachtStatusEnum;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYachtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yachts', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->enum('type',YachtTypeEnum::values);
            $table->enum('status',YachtStatusEnum::values);
            $table->string('code');
            $table->string('color');
            $table->unsignedInteger('passenger_capacity');
            $table->unsignedInteger('size');
            $table->unsignedInteger('no_of_captain');
            $table->unsignedInteger('crew_members');
            $table->string('corporate_company')->nullable();
            $table->double('corporate_price');
            $table->unsignedInteger('selling_per_hour');
            $table->double('yacht_special_price')->default(0);
            $table->unsignedInteger('minimum_hours_booking');
            $table->boolean('apply_vat');
            $table->unsignedInteger('cruising_speed');
            $table->unsignedInteger('max_speed');
            $table->unsignedInteger('horse_Power');
            $table->unsignedInteger('length');
            $table->enum('fuel_type',FuelTypeEnum::values());
            $table->enum('hull_type',HullTypeEnum::values());
            $table->enum('engine_type',EngineTypeEnum::values());
            $table->unsignedInteger('beam');
            $table->boolean('water_slider');
            $table->boolean('safety_equipment');
            $table->boolean('soft_drinks_refreshments');
            $table->boolean('swimming_equipment');
            $table->boolean('ice_tea_water');
            $table->boolean('DVD_player');
            $table->boolean('satellite_system');
            $table->boolean('red_carpet_on_arrival');
            $table->boolean('spacious_saloon');
            $table->boolean('BBQ_grill_equipment');
            $table->boolean('fresh_towels');
            $table->boolean('yacht_slippers');
            $table->boolean('bathroom_amenities');
            $table->boolean('under_water_light');
            $table->boolean('LED_screen_tv');
            $table->boolean('sunbathing_on_the_foredeck');
            $table->boolean('fishing_equipment');
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
        Schema::dropIfExists('yachts');
    }
}
