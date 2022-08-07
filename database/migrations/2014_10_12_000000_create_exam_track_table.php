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
        Schema::create('exam_track', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('exam_id');
            $table->integer('stage_1')->nullable();
            $table->integer('stage_2')->nullable();
            $table->integer('stage_3')->nullable();
            $table->integer('stage_4')->nullable();
            $table->integer('stage_5')->nullable();
            $table->integer('stage_6')->nullable();
            $table->integer('stage_7')->nullable();
            $table->integer('stage_8')->nullable();
            $table->integer('stage_9')->nullable();
            $table->integer('stage_10')->nullable();
            $table->integer('stage_11')->nullable();
            $table->integer('exam')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('exam_track');
    }
};
