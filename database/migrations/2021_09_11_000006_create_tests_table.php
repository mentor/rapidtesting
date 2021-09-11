<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->datetime('start')->nullable();
            $table->datetime('end')->nullable();
            $table->string('pinrc')->nullable();
            $table->string('pinid');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->date('dob');
            $table->string('street');
            $table->string('city');
            $table->string('postal');
            $table->string('country');
            $table->string('symptoms');
            $table->datetime('result_date')->nullable();
            $table->string('result_status')->nullable();
            $table->string('result_test_name')->nullable();
            $table->string('result_test_manufacturer')->nullable();
            $table->string('result_diagnosis')->nullable();
            $table->string('note')->nullable();
            $table->integer('reservation_id_ref');
            $table->string('code_ref');
            $table->string('insurance_company');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
