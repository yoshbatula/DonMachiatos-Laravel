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
        Schema::create('_carts', function (Blueprint $table) {
            $table->id("CartID");
            $table->unsignedBigInteger('productID');
            $table->foreign('productID')->references('productID')->on('products')->onDelete('cascade');
            $table->decimal('productPrice', 8, 2);
            $table->string('productSize'); 
            $table->string('productName');
            $table->integer('productQuantity');
            $table->string('productImage')->nullable();
            $table->string('productMood');
            $table->string('productSugar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_carts');
    }
};
