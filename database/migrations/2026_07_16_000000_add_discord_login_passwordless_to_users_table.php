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
        Schema::table('users', function (Blueprint $table) {
            // Mirrors discord_accounts.has_custom_password onto the user itself
            // (inverted), so it survives a forced admin unlink of a passwordless
            // account: the discord_accounts row is gone at that point, but the
            // account still needs to be recognized as unable to log in.
            $table->boolean('discord_login_passwordless')->default(false)->after('password_changed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('discord_login_passwordless');
        });
    }
};
