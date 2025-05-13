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
        Schema::create('company_information', function (Blueprint $table) {
            $table->id();

            $table->longText('about_us')->nullable();
            $table->longText('chairman_message')->nullable();
            $table->longText('managing_director_message')->nullable();

            $table->longText('background')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('objectives')->nullable();
            $table->longText('legal_status')->nullable();
            $table->longText('organogram')->nullable();
            $table->longText('working_area')->nullable();
            $table->longText('at_a_glance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_information');
    }
};
