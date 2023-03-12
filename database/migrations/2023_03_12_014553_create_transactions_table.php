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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->string('customerEmail');
            $table->string('paymentMethod');
            $table->string('description');
            $table->string('transactionReference');
            $table->string('paymentReference');
            $table->string('transactionType');
            $table->string('transactionProcessor');

            $table->unsignedDecimal('amount', 14, 4);
            $table->unsignedDecimal('fee');

            $table->integer('transactionStatus');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
