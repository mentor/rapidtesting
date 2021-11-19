<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CentreNullableResultTestManufacturerAndTestName extends Migration
{
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->string('result_test_manufacturer')->default('')->change();
            $table->string('result_test_name')->default('')->change();
        });
    }

    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            //
        });
    }
}