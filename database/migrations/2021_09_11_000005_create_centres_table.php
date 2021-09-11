<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentresTable extends Migration
{
    public function up()
    {
        Schema::create('centres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('street');
            $table->string('city');
            $table->string('postal');
            $table->integer('place_id_ref')->unique();
            $table->string('country');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
