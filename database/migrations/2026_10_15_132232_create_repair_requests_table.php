<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repair_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users');
            $table->string('title');
            $table->string('item_name');
            $table->string('category');
            $table->text('description');
            $table->date('preferred_date')->nullable();
            $table->string('service_location');
            $table->string('preferred_technician')->nullable();
            $table->string('status')->default('Pending');
            $table->decimal('estimated_weight_kg', 8, 2)->default(0);
            $table->decimal('estimated_waste_avoided_kg', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repair_requests');
    }
};
