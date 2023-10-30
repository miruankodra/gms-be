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
        Schema::create('widgets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('gh_id')->unsigned()->index()->nullable();
            $table->foreign('gh_id')->references('id')->on('greenhouses')->onDelete('cascade');
            $table->boolean('watering')->default(0);
            $table->boolean('ac')->default(0);
            $table->boolean('door')->default(0);
            $table->boolean('window')->default(0);
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
        Schema::dropIfExists('widgets');
    }
};
