<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBody extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function car()
    {
        return $this->belongsToMany(Car::class);
    }
}
