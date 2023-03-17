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
        Schema::create('support_ticket_messages', function (Blueprint $table) {

            $table->id();

            $table->longText('message');
            $table->string('sender');
            $table->unsignedBigInteger('ticket_id');

            $table->foreign('ticket_id')->references('id')->on('support_tickets')->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_ticket_messages');
    }
};
