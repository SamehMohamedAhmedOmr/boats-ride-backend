<?php

use Illuminate\Support\Facades\Schema;
use Modules\Yacht\Enums\TripStatusEnum;
use Illuminate\Database\Schema\Blueprint;
use Modules\Yacht\Enums\PaymentMethodsEnum;
use Illuminate\Database\Migrations\Migration;

class CreateWaterSportTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_sport_trips', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->time('start_hour');
            $table->date('end_date');
            $table->time('end_hour');
            $table->enum('status',TripStatusEnum::values());
            $table->enum('payment_method',PaymentMethodsEnum::values());
            $table->unsignedBigInteger('water_sport_id');
            $table->foreign('water_sport_id')->references('id')->on('water_sports')->onDelete('cascade');
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedInteger('number_of_people');
            $table->unsignedInteger('rate_per_hour');
            $table->double('other_changes')->default(0);
            $table->double('discount')->default(0);
            $table->double('minimum_Advance_Payment')->default(0);
            $table->string('coupon_code')->nullable();
            $table->text('client_notes')->nullable(); 
            $table->text('admin_notes')->nullable();
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
        Schema::dropIfExists('water_sport_trips');
    }
}
