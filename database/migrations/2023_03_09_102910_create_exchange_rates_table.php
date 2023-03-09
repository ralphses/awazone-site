<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exchange_rates', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('added_by');

            $table->string('name');
            
            $table->unsignedBigInteger('first');
            $table->unsignedBigInteger('second');

            $table->unsignedDecimal('rate', 10, 5);
            $table->unsignedDecimal('first_to_second', 10, 5);
            $table->unsignedDecimal('second_to_first', 10, 5);            
            
            $table->foreign('first')->references('id')->on('currencies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('second')->references('id')->on('currencies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('added_by')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_rates');
    }
};
