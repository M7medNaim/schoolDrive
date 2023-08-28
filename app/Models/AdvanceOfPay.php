<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceOfPay extends Model
{
    use HasFactory;
    protected $fillable = [
        'advance_date',
        'amount',
        'employee_id',
    ];
    public function employee(){
        return $this->belongsTo(Employee::class , 'employee_id' , 'id');
    }
}
