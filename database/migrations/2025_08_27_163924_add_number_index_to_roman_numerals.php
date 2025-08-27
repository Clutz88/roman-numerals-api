<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('roman_numerals', function (Blueprint $table) {
            $table->index('number');
        });
    }

    public function down()
    {
        Schema::table('roman_numerals', function (Blueprint $table) {
            $table->dropIndex('number');
        });
    }
};
