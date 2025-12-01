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
        Schema::create('returns', function (Blueprint $table) {
            $table->id();
            
            // foreign key 1
            $table->unsignedBigInteger('sale_id')->nullable();
            $table->foreign('sale_id')
                    ->references('id')->on('sales')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->text('reason');
            $table->decimal('total_refund', 10, 2);
            
            // foreign key 2
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            // foreign key 3
            $table->unsignedBigInteger('outlet_id')->nullable();
            $table->foreign('outlet_id')
                    ->references('id')->on('outlets')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returns');
    }
};
