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
        Schema::create('modalities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('greenhouse_id')->unsigned()->index()->nullable();
            $table->foreign('greenhouse_id')->references('id')->on('greenhouses')->onDelete('cascade');
            $table->bigInteger('bot_id')->unsigned()->index()->nullable();
            $table->foreign('bot_id')->references('id')->on('modalities')->default(1);
            $table->string('name', 50);
            $table->string('description', 150)->nullable();
            $table->float('max_temperature');
            $table->float('min_temperature');
            $table->float('max_air_humidity');
            $table->float('min_air_humidity');
            $table->float('max_soil_humidity');
            $table->float('min_soil_humidity');
            $table->boolean('enabled')->default(false);
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
        Schema::dropIfExists('modalities');
    }
};
