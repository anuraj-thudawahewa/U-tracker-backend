<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGpsReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gps_readings', function (Blueprint $table) {
            //$table->id();
           // $table->timestamps();
            $table->integer('trip_id');
            $table->integer('device_id');
            $table->float('latitude');
            $table->float('longitude');
            $table->dateTime('time');
            $table->integer('speed');
            $table->string('engine_condition');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gps_readings');
    }
}
