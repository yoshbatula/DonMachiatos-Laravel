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
        Schema::create('_order', function (Blueprint $table) {
            $table->id('OrderID');
            $table->unsignedBigInteger('CartID');
            $table->decimal('TotalAmount', 8, 2);
            $table->string('PaymentMethod');
            $table->dateTime('OrderDate');
            $table->foreign('CartID')->references('id')->on('carts')->onDelete('cascade');
            $table->integer('OrderNumber')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_order');
    }
};
