<?php

use App\Models\utils\Utility;
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
        Schema::create('support_tickets', function (Blueprint $table) {

            $table->id();

            $table->string('ticket_id');
            $table->string('subject');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('message');
            $table->text('attachment');
            $table->string('status')->default(Utility::SUPPORT_TICKET_STATUS['open']);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
