<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('customer')->after('password');
            $table->string('specialization')->nullable()->after('role');
            $table->string('service_area')->nullable()->after('specialization');
            $table->text('bio')->nullable()->after('service_area');
            $table->string('photo_url')->nullable()->after('bio');
            $table->boolean('is_verified')->default(false)->after('photo_url');
            $table->unsignedInteger('eco_points')->default(0)->after('is_verified');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'specialization', 'service_area', 'bio', 'photo_url', 'is_verified', 'eco_points']);
        });
    }
};
