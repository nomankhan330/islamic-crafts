<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('custom_order_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('category');
            $table->text('description');
            $table->string('budget')->nullable();
            $table->string('reference_image')->nullable();
            $table->enum('status', ['new', 'replied', 'completed'])->default('new');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('custom_order_requests');
    }
};
