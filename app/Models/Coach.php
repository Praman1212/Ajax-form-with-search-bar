<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'club',
        'country',
        'is_retired',
        'image',
        'trophy_number'
    ];
}
