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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');

            $table->string('address')->nullable();
            $table->string('mobile_number')->nullable();
            $table->unsignedBigInteger('pharmacy_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->boolean('active')->default(true);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('set null');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('set null');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
