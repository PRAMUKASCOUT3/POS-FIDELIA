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
        Schema::create('cashiers', function (Blueprint $table) {
            $table->id();
            $table->string('code',15);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->nullable(); //
            $table->foreignId('product_id')->constrained()->cascadeOnDelete(); //
            $table->date('date');
            $table->string('total_item',15);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('amount_paid', 10, 2); 
            $table->string('status',10);            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashiers');
    }
};
