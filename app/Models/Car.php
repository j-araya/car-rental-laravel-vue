<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'plate',
        'color',
        'cartype_id',
        'state',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
    ];
}
