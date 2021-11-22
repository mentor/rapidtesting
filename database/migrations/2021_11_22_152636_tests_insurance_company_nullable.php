<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TestsInsuranceCompanyNullable extends Migration
{
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->string('insurance_company')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            //
        });
    }
}
