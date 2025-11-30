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
        Schema::create('returns_items', function (Blueprint $table) {
            $table->id();
            
            // foreign key 1
            $table->unsignedBigInteger('return_id')->nullable();
            $table->foreign('return_id')
                    ->references('id')->on('returns')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            // foreign key 2
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')
                    ->references('id')->on('products')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            
            $table->decimal('unit_price', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->text('notes');
            $table->text('reason');

            $table->timestamps(); //buat created_at sama updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returns_items');
    }
};
