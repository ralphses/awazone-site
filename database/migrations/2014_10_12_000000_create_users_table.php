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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->nullable(true)->unique();
            $table->string('password');
            $table->string('referral_code')->nullable(true);
            $table->string('referred_by')->nullable(true);
            
            $table->string('image_path')->nullable();

            $table->date('date_of_birth')->nullable(true);

            $table->boolean('is_locked')->default(true);

            $table->unsignedBigInteger('roles_id');
            $table->unsignedBigInteger('main_currency')->nullable();

            $table->foreign('roles_id')->references('id')->on('roles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('main_currency')->references('id')->on('currencies')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamp('email_verified_at')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
