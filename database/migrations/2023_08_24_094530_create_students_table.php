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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('id_number')->unique();
            $table->bigInteger('phone');
            $table->date('date_of_birth');
            $table->enum('type_of_license', ['ملاكي عادي'  , 'تجاري', 'ملاكي أتوماتيك']);
            $table->enum('number_of_examination', ['1'  , '2', '3', '4']);
            $table->enum('application', ['شفوي' , 'تحريري']);
            $table->enum('result', ['راسب' , 'ناجح' , 'لم يقدم']);
            $table->enum('license_system', ['بالدرس' , 'مقاولة' ]);
            $table->integer('agreed_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
