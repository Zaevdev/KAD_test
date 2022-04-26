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
        Schema::create('сurrencies', function (Blueprint $table) {
            $table->id();
            $table->string('id_cbr');
            $table->string('name');
            $table->string('english_name');
            $table->string('alphabetic_code');
            $table->string('digit_code');
            $table->unsignedDouble('rate');
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
        Schema::dropIfExists('сurrencies');
    }
};