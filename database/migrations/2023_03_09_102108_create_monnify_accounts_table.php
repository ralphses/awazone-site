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
        Schema::create('monnify_accounts', function (Blueprint $table) {
            $table->id();

            $table->string('customerName');
            $table->string('accountNumber');
            $table->string('bank');
            $table->string('reference');
            $table->string('bvn');
            $table->string('currency');

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monnify_accounts');
    }
};
