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
        Schema::table('service_details', function (Blueprint $table) {
            $table->string('lottie_json')->nullable()->after('description2');
            $table->string('header_image')->nullable()->after('lottie_json');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_details', function (Blueprint $table) {
            $table->dropColumn('lottie_json');
            $table->dropColumn('header_image');
        });
    }
};
