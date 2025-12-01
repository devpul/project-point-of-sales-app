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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->enum('type', ['percentage', 'fixed_amount']);
            $table->decimal('amount', 10, 2);
            $table->decimal('min_purchases', 10, 2);
            $table->decimal('max_discount', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('usage_limit');
            $table->integer('used_count');
            $table->boolean('is_active');
            $table->text('descripition');
            $table->timestamps(); //buat column created_att dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
