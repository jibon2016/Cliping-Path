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
        Schema::table('company_information', function (Blueprint $table) {
            $table->text('contact_us')->nullable()->after('about_us');
        });

        Schema::table('contact_information', function (Blueprint $table) {
            $table->text('instragram_url')->nullable()->after('facebook_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_information', function (Blueprint $table) {
            $table->dropColumn('contact_us');
        });
        Schema::table('contact_information', function (Blueprint $table) {
            $table->dropColumn('instragram_url');
        });

    }
};
