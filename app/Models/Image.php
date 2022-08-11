<?php

namespace App\Models;

use App\Traits\CacheableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory, CacheableTrait;

    protected $fillable = [
        'path',
        'alt',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
