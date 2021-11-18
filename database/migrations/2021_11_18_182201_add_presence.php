<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPresence extends Migration
{
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            //
            $table->boolean('presence')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            //
            $table->dropColumn('presence');
        });
    }
}
