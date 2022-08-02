<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'body',
        'price',
        'old_price',
        'salon',
        'car_class_id',
        'kpp',
        'year',
        'color',
        'car_body_id',
        'car_engine_id',
        'is_new',
    ];

    public function car_class()
    {
        return $this->belongsTo(CarClass::class, 'car_class_id');
    }

    public function car_body()
    {
        return $this->belongsTo(CarBody::class, 'car_body_id');
    }

    public function car_engine()
    {
        return $this->belongsTo(CarEngine::class, 'car_engine_id');
    }
}
