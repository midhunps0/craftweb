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
        Schema::create('airpay_payments', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('airpay_transaction_id')->nullable();
            $table->string('airpay_transaction_type')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('sp_cd');
            $table->string('cons_id');
            $table->string('sp_name');
            $table->string('cons_name');
            $table->string('selected_date');
            $table->string('selected_time');
            $table->float('amount');
            $table->boolean('status')->nullable();
            $table->string('transaction_remarks')->nullable();
            $table->boolean('solver_confirmed')->default(false);
            $table->boolean('solver_booking_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airpay_payments');
    }
};
