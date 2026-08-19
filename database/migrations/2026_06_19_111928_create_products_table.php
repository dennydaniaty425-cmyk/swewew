<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('brand');
            $table->string('category'); // pod, mod, liquid, coil, battery, starter
            $table->text('description');
            $table->text('specs')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('price_original')->nullable();
            $table->string('badge')->nullable(); // new, hot, sale
            $table->string('color_gradient'); // CSS gradient class
            $table->unsignedInteger('stock')->default(10);
            $table->decimal('rating', 2, 1)->default(5.0);
            $table->unsignedInteger('review_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['category', 'is_active']);
            $table->index('brand');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
