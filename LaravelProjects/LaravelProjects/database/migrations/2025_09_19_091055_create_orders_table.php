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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number');
            $table->integer('number_of_products');
            $table->string('cutomerName');
            $table->string('mobile_number', 15);
            $table->decimal('order_total');
            $table->date('date');
            $table->string('status');
            $table->string('customer_id');
            $table->string('book_by');
            $table->string('order_mode');
            $table->date('contract_start_date');
            $table->date('contract_end_date');
            $table->time('time');
            $table->string('coupan');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
