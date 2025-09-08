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
        Schema::table('profiles', function (Blueprint $table) {
            // Profile page fields
            $table->text('visi')->nullable()->after('deskripsi_usaha');
            $table->text('misi')->nullable()->after('visi');
            $table->text('prinsip')->nullable()->after('misi');
            $table->string('team_image')->nullable()->after('prinsip');

            // Contact page fields
            $table->text('map_embed_url')->nullable()->after('team_image');
            $table->string('location_address')->nullable()->after('map_embed_url');
            $table->string('email_address')->nullable()->after('location_address');
            $table->string('social_link')->nullable()->after('email_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'visi', 
                'misi', 
                'prinsip', 
                'team_image', 
                'map_embed_url', 
                'location_address', 
                'email_address', 
                'social_link'
            ]);
        });
    }
};