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
        Schema::create('monthlytaxes', function (Blueprint $table) {
            $table->id();
            $table->string('taxe_day_month');
            $table->integer('taxe_month');
            $table->integer('amount');
            $table->unsignedBigInteger('annualtaxe_id'); 
            $table->foreign('annualtaxe_id')->references('id')->on('annualtaxes')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthlytaxes');
    }
};
