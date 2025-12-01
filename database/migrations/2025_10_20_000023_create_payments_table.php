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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            
            // foreign key 1
            $table->unsignedBigInteger('sale_id')->nullable();
            $table->foreign('sale_id')
                    ->references('id')->on('sales')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            
            $table->enum('method', ['cash', 'qris']);
            $table->decimal('amount', 10, 2);
            $table->enum('receipt_method', ['print', 'email']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
