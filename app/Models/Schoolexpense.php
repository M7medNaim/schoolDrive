<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolexpense extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'reason',
        'expense_date',
        'note',
    ];
}
