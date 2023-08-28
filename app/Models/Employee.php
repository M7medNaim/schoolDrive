<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'id_number',
        'phone',
        'salary',
    ];
    public function AdvanceOfPays(){
        return $this->hasMany(AdvanceOfPay::class , 'employee_id' , 'id');
    }
}
