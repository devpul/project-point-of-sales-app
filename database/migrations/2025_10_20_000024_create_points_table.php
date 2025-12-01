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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            
            // foreign key 1
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')
                    ->references('id')->on('customers')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            
            // foreign key 2
            $table->unsignedBigInteger('sale_id')->nullable();
            $table->foreign('sale_id')
                    ->references('id')->on('sales')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            
            $table->integer('point');
            $table->enum('type', ['earn', 'redeem']);
            $table->text('description');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
