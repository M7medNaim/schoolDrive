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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->enum('test_receipt', ['firstTest' , 'secondTest' , 'thirdTest' , 'fourthTest','notPay']);
            $table->enum('signals_receipt', ['firstSignal' , 'secondSignal' , 'thirdSignal' , 'fourthSignal','notPay']);
            $table->tinyInteger('registration_receipt')->default(0);
            $table->tinyInteger('program_receipt')->default(0);
            $table->unsignedBigInteger('student_id'); 
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
