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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donation_fund_id');
            $table->string('name');
            $table->string('mobile_no');
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->boolean('is_organisation')->default(0);
            $table->string('organisation_name')->nullable();
            $table->float('amount',50)->default(0);
            $table->text('comments')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
