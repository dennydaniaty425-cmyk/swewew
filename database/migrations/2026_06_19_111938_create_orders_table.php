<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->text('shipping_address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code', 10);
            $table->string('courier'); // jne, sicepat, gojek
            $table->unsignedInteger('shipping_cost');
            $table->unsignedInteger('subtotal');
            $table->unsignedInteger('total');
            $table->string('payment_method'); // transfer, qris, cod
            $table->string('status')->default('pending'); // pending, paid, processing, shipped, delivered
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('customer_email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
