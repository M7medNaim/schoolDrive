<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_receipt',
        'signals_receipt',
        'registration_receipt',
        'program_receipt',
        'sudent_id',
    ];

    public function student(){
        return $this->belongsTo(Student::class , 'student_id' , 'id');
    }

}
