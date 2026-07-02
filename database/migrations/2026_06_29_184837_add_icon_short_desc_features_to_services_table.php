<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('is_home');
            $table->text('short_description')->nullable()->after('icon');
            $table->json('features')->nullable()->after('short_description');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['icon', 'short_description', 'features']);
        });
    }
};
