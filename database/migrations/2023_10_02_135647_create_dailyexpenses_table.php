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
        Schema::create('dailyexpenses', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->string('reason_exchange');
            $table->date('date');
            $table->enum('type' , ['inputs' , 'expenses']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailyexpenses');
    }
};
