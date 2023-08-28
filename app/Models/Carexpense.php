<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carexpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'expense_date',
        'reason',
        'car_id',
    ];

    public function car(){
        return $this->belongsTo(Car::class , 'car_id' , 'id');
    }
    
}
