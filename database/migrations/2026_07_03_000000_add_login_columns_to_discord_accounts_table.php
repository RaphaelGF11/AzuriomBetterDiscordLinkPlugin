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
        Schema::table('discord_accounts', function (Blueprint $table) {
            $table->boolean('bypass_2fa')->default(false)->after('expires_at');
            $table->boolean('has_custom_password')->default(true)->after('bypass_2fa');
            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('discord_accounts', function (Blueprint $table) {
            $table->dropUnique(['user_id']);
            $table->dropColumn(['bypass_2fa', 'has_custom_password']);
        });
    }
};
