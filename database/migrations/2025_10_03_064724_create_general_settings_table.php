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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('CompanyName');
            $table->string('Code');
            $table->string('Phone');
            $table->string('Phone2')->nullable();
            $table->string('Plot')->nullable();
            $table->string('Address')->nullable();
            $table->string('Email');
            $table->string('Country');
            $table->string('Currency')->nullable();
            $table->string('Logo')->nullable();
            $table->string('Crumb')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
