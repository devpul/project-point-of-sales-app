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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            // foreign key 1
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')
                    ->references('id')->on('suppliers')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

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

            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
