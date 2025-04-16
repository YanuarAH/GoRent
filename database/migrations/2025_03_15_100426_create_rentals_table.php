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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->string('customer_name')->nullable();
            $table->string('customer_nik')->nullable();
            $table->string('customer_phone')->nullable();
            $table->text('customer_address')->nullable();
            $table->enum('customer_gender', ['male', 'female'])->nullable();
            $table->dateTime('rental_date');
            $table->dateTime('return_date');
            $table->decimal('total_payment', 10, 2);
            $table->enum('payment_status', ['pending', 'expired', 'paid', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->string('payment_order_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
