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
            $table->string('website_link', 2048)->nullable()->after('profile_photo_path');
            $table->string('old_password', 2048)->nullable()->after('website_link');
            $table->string('new_password', 2048)->nullable()->after('old_password');
            $table->string('confirm_password', 2048)->nullable()->after('new_password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
