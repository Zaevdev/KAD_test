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
    public function up(): void
    {
        Schema::create('currencies', static function (Blueprint $table) {
            $table->string('id', 8)->primary();
            $table->string('name', 50)->unique();
            $table->string('english_name', 50);
            $table->string('alphabetic_code', 3)->unique();
            $table->char('digit_code', 3)->unique();
            $table->decimal('rate', 6, 4, true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};