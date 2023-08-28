<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'id_number',
        'phone',
        'driving_license',
        'training_number',
        'license_degree',
        'license_expiration_date',
    ];
}
