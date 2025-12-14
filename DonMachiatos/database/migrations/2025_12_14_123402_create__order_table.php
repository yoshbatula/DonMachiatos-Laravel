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
            $table->id('OrderID');
            $table->unsignedBigInteger('CartID');
            $table->decimal('TotalAmount', 8, 2);
            $table->string('PaymentMethod');
            $table->dateTime('OrderDate');
            $table->foreign('CartID')->references('CartID')->on('_carts')->onDelete('set null');
            $table->integer('OrderNumber')->unique();
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
