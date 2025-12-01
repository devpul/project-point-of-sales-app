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
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            
            // foreign key 1
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')
                    ->references('id')->on('products')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
                    
            // foreign key 2
            $table->unsignedBigInteger('stock_id')->nullable();
            $table->foreign('stock_id')
                    ->references('id')->on('stocks')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stocks');
    }
};
