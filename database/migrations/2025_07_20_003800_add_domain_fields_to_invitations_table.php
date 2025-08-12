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
        // Add domain fields to invitations table
        Schema::table('invitations', function (Blueprint $table) {
            $table->string('subdomain')->nullable()->after('custom_domain');
            $table->enum('domain_type', ['path', 'subdomain', 'custom'])->default('path')->after('subdomain');
            
            // Add index for subdomain lookup
            $table->index('subdomain');
            $table->unique('subdomain');
        });

        // Add premium field to users table
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('premium_until')->nullable()->after('wallet_balance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropIndex(['subdomain']);
            $table->dropUnique(['subdomain']);
            $table->dropColumn(['subdomain', 'domain_type']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('premium_until');
        });
    }
};