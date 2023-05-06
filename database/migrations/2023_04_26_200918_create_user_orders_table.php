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
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->date('order_date');
            $table->string('order_status')->default('pending');
            $table->decimal('order_total', 8, 2)->default(0.00);
            $table->date('shipping_date')->nullable();
            $table->unsignedBigInteger('pharmacy_id');
            $table->unsignedBigInteger('user_id');
            $table->string('prescription_code')->nullable();
            $table->string('prescription_status')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_orders');
    }
};
