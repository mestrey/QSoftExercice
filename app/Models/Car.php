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
        'category_id',
        'image_id'
    ];

    public function carClass()
    {
        return $this->belongsTo(CarClass::class, 'car_class_id');
    }

    public function carBody()
    {
        return $this->belongsTo(CarBody::class, 'car_body_id');
    }

    public function carEngine()
    {
        return $this->belongsTo(CarEngine::class, 'car_engine_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}
