<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDalibarymanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dalibaryman', function (Blueprint $table) {
            $table->bigIncrements('dalibaryman_id');
            $table->string('dalibaryman_name');
            $table->string('dalibaryman_description');
            $table->string('dalibaryman_image');
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
        Schema::dropIfExists('dalibaryman');
    }
}
