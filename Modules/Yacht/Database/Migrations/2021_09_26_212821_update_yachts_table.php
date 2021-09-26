<?php

use Modules\Yacht\Enums\FuelTypeEnum;
use Modules\Yacht\Enums\HullTypeEnum;
use Illuminate\Support\Facades\Schema;
use Modules\Yacht\Enums\EngineTypeEnum;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateYachtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yachts', function (Blueprint $table) {
            $table->string('manufacturer')->nullable()->change();
            $table->unsignedInteger('cruising_speed')->nullable()->change();
            $table->unsignedInteger('max_speed')->nullable()->change();
            $table->unsignedInteger('horse_Power')->nullable()->change();
            $table->unsignedInteger('length')->nullable()->change();
            $table->unsignedInteger('beam')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('', function (Blueprint $table) {

        });
    }
}
