<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('climates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('greenhouse_id')->unsigned()->index()->nullable();
            $table->foreign('greenhouse_id')->references('id')->on('greenhouses')->onDelete('cascade');
            $table->bigInteger('bot_id')->unsigned()->index()->nullable();
            $table->foreign('bot_id')->references('id')->on('bots')->onDelete('cascade');
            $table->float('temperature');
            $table->float('air_humidity');
            $table->float('soil_humidity');
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
        Schema::dropIfExists('climate');
    }
};
