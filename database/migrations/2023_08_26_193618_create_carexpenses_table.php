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
        Schema::create('carexpenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('amount');
            $table->date('expense_date');
            $table->string('reason');
            $table->unsignedBigInteger('car_id'); 
            $table->foreign('car_id')->references('id')->on('cars')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carexpenses');
    }
};
