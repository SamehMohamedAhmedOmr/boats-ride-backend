<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYachtRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yacht_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('yacht_id');
            $table->foreign('yacht_id')->references('id')->on('yachts')->onDelete('cascade');
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
        Schema::dropIfExists('yacht_requests');
    }
}
