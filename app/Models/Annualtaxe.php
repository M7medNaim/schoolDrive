<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annualtaxe extends Model
{
    use HasFactory;
    protected $fillable = ['taxe_year', 'amount'];
    
    public function monthlytaxes(){
        return $this->hasMany(Monthlytaxe::class , 'annualtaxe_id' , 'id');
    }
}
