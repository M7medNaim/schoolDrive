<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_number',
        'date_of_birth',
        'type_of_license',
        'number_of_examination',
        'application',
        'result',
        'license_system',
        'agreed_amount',
    ];

    public function lessons(){
        return $this->hasMany(Lesson::class , 'student_id' , 'id');
    }
    public function payments(){
        return $this->hasMany(Payment::class , 'student_id' , 'id');
    }
    public function receipts(){
        return $this->hasMany(Receipt::class , 'student_id' , 'id');
    }
}
