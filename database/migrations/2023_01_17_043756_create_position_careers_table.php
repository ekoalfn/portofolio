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
        Schema::create('position_careers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('career_id')->nullable()->unsigned();
            $table->bigInteger('position_id')->nullable()->unsigned();
            $table->string('other')->nullable();
            $table->timestamps();

            $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_careers');
    }
};
