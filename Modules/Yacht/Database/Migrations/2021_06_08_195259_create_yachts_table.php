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
            $table->json('what_expect_description');
            $table->json('what_is_included');
            $table->json('facilities');
            $table->json('slug')->unique();
            $table->enum('type',YachtTypeEnum::values());
            $table->enum('status',YachtStatusEnum::values());
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
            $table->string('manufacturer');
            $table->unsignedInteger('cruising_speed');
            $table->unsignedInteger('max_speed');
            $table->unsignedInteger('horse_Power');
            $table->unsignedInteger('length');
            $table->enum('fuel_type',FuelTypeEnum::values())->nullable();
            $table->enum('hull_type',HullTypeEnum::values())->nullable();
            $table->enum('engine_type',EngineTypeEnum::values())->nullable();
            $table->unsignedInteger('beam');
            $table->boolean('water_slider')->default(0);
            $table->boolean('safety_equipment')->default(0);
            $table->boolean('soft_drinks_refreshments')->default(0);
            $table->boolean('swimming_equipment')->default(0);
            $table->boolean('ice_tea_water')->default(0);
            $table->boolean('DVD_player')->default(0);
            $table->boolean('satellite_system')->default(0);
            $table->boolean('red_carpet_on_arrival')->default(0);
            $table->boolean('spacious_saloon')->default(0);
            $table->boolean('BBQ_grill_equipment')->default(0);
            $table->boolean('fresh_towels')->default(0);
            $table->boolean('yacht_slippers')->default(0);
            $table->boolean('bathroom_amenities')->default(0);
            $table->boolean('under_water_light')->default(0);
            $table->boolean('LED_screen_tv')->default(0);
            $table->boolean('sunbathing_on_the_foredeck')->default(0);
            $table->boolean('fishing_equipment')->default(0);
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
