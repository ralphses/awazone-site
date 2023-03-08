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
        Schema::create('user_addresses', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('phone')->unique()->nullable(true);
            $table->text('address')->nullable(true);
            $table->string('zip_or_postal_code')->nullable(true);
            $table->string('state')->nullable(true);
            $table->string('province')->nullable(true);
            $table->string('country')->nullable(true);

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
