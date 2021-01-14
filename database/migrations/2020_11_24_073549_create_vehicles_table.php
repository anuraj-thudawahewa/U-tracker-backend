<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('vehicle_number');
            $table->string('type');
            $table->string('owner_name');
            $table->string('owner_contact_no')->nullable();
            $table->string('driver_name');
            $table->string('driver_contact_no')->nullable();
            $table->string('device_id')->nullable();
            $table->integer('unit_per_km')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
