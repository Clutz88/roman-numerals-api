<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('roman_numerals', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('numeral');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roman_numerals');
    }
};
