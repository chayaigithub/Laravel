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
        Schema::create('dashboard', function (Blueprint $table) {
            $table->id();
            $table->integer('total_users');
            $table->integer('total_orders');
            $table->integer('total_completed_orders');
            $table->integer('total_employees');
            $table->integer('total_products');
            $table->integer('todays_orders');
            $table->integer('tommorows_orders');
            $table->integer('total_complaints');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard');
    }
};
