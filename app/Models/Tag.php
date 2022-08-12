<?php

namespace App\Models;

use App\Traits\CacheableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, CacheableTrait;

    protected $fillable = [
        'name',
    ];

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }
}
