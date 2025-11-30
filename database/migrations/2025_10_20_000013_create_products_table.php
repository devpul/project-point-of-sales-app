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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            // foreign key 1
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            
            $table->integer('price');
            $table->text('image');
            $table->string('sku');
            $table->string('barcode_number');
            $table->enum('has_promo', ['yes', 'no']);

            // foreign key 2
            $table->unsignedBigInteger('outlet_id')->nullable();
            $table->foreign('outlet_id')
                    ->references('id')->on('outlets')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            
            $table->enum('promo_type', ['percentage', 'fixed_amount']);
            $table->decimal('promo_amount', 12, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
