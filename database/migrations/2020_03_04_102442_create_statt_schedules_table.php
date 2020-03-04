<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStattSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statt_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('event_id');
            $table->integer('venue_id');
            $table->integer('staffdetail_id')->unsigned();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statt_schedules');
    }
}
