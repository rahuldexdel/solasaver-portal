<?php

// database/migrations/xxxx_xx_xx_create_orders_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('status')->default('pending'); // pending | confirmed | shipped | delivered | cancelled
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->string('phone')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('payment_status')->default('unpaid'); // unpaid | paid | refunded
            $table->string('payment_method')->nullable();
            $table->string('payment_reference')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('orders'); }
};