<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthlytaxe extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'taxe_day_month',
        'taxe_month',
        'annualtaxe_id',
    ];

    public function annualtaxe(){
        return $this->belongsTo(Annualtaxe::class , 'annualtaxe_id' , 'id');
    }
}
