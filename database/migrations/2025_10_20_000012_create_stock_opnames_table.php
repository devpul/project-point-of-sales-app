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
        Schema::create('stock_opnames', function (Blueprint $table) {
            $table->id();
            $table->timestamp('opname_date');

            // foreign key 1
            $table->unsignedbigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('set null');

            // foreign key 2
            $table->unsignedbigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
                
            $table->integer('quantity');

            $table->string('notes');

            $table->enum('mode', ['in', 'out']);

            // foreign key 3
            $table->unsignedbigInteger('stock_id')->nullable();
            $table->foreign('stock_id')
            ->references('id')->on('stocks')
            ->onUpdate('cascade')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_opnames');
    }
};
