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
        Schema::create('discord_login_role_syncs', function (Blueprint $table) {
            $table->id();
            $table->string('discord_guild_id');
            $table->string('discord_role_id');
            // Conditions, all ANDed together within a rule when set; a null
            // condition is simply not checked. Multiple rules targeting the
            // same (guild, role) pair are ORed - see RoleSyncEvaluator.
            $table->json('site_role_ids')->nullable();
            // No FK: the shop plugin is optional and may not be installed.
            $table->unsignedBigInteger('shop_package_id')->nullable();
            $table->decimal('balance_min', 15, 2)->nullable();
            $table->decimal('balance_max', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discord_login_role_syncs');
    }
};
