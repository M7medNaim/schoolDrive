<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_car',
        'car_number',
        'model',
        'license_expiry',
        'Insurance_expiry',
    ];
    
    
    public function carexpenses(){
        return $this->hasMany(Carexpense::class , 'car_id' , 'id');
    }
    
}
