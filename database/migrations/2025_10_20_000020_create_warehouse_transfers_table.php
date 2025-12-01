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
        Schema::create('warehouse_transfers', function (Blueprint $table) {
            $table->id();

            // foreign key 1
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->foreign('warehouse_id')
                    ->references('id')->on('warehouses')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            
            // foreign key 2
            $table->unsignedBigInteger('outlet_id')->nullable();
            $table->foreign('outlet_id')
                    ->references('id')->on('outlets')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            
            // foreign key 3
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')
                    ->references('id')->on('products')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->integer('qty');
            
            // foreign key 4
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->timestamp('transfer_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_transfers');
    }
};
