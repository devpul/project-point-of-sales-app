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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit');

            // foreign key
            $table->unsignedbigInteger('warehouse_id')->nullable();
            $table->foreign('warehouse_id')
                    ->references('id')->on('warehouses')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->timestamps();
            $table->integer('current_stock')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
