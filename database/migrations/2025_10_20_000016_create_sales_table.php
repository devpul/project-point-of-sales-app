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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_code');

            // foreign key 1
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            // foreign key 2
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')
                    ->references('id')->on('customers')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            // foreign key 3
            $table->unsignedBigInteger('outlet_id')->nullable();
            $table->foreign('outlet_id')
                    ->references('id')->on('outlets')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->decimal('total_amount', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->enum('method', ['cash', 'qris']);
            $table->decimal('paid_amount', 10, 2);
            $table->decimal('cash_change', 10, 2);
            $table->enum('status', ['pending', 'paid', 'cancel', 'refund']);
            
            // foreign key 4
            $table->unsignedBigInteger('shift_id')->nullable();
            $table->foreign('shift_id')
                    ->references('id')->on('shifts')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->enum('receipt_method', ['print', 'email'])->default('print');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
