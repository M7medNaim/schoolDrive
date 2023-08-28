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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->enum('type_car', ['ملاكي عادي'  , 'تجاري' , 'ملاكي أتوماتيك']);
            $table->string('car_number')->unique();
            $table->bigInteger('model');
            $table->date('license_expiry');
            $table->date('Insurance_expiry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
