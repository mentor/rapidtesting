<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTestsTable extends Migration
{
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id', 'service_fk_4851069')->references('id')->on('services');
            $table->unsignedBigInteger('centre_id');
            $table->foreign('centre_id', 'centre_fk_4843729')->references('id')->on('centres');
        });
    }
}
