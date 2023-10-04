<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dailyexpense extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'reason_exchange',
        'date',
        'type'
    ];
}
