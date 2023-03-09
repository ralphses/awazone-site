<?php

use App\Models\utils\Utility;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $fillable = [
        'user_id',
        'accountNumber',
        'accountType',
        'balance',
        'currency',
        'status',
        'accountName'
    ];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aibopay_accounts', function (Blueprint $table) {
            
            $table->id();

            $table->string('accountName');
            $table->string('accountNumber')->unique();
            $table->string('accountType');
            $table->string('currency');
            $table->string('status')->default(Utility::AIBOPAY_ACCOUNT_STATUS['active']);

            $table->unsignedDecimal('balance', 14, 2)->default(0.0);

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
        Schema::dropIfExists('aibopay_accounts');
    }
};
