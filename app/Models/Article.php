<?php

namespace App\Models;

use App\Interfaces\HasTags;
use App\Traits\CacheableTrait;
use App\Traits\EmailOnEventTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model implements HasTags
{
    use HasFactory, CacheableTrait, EmailOnEventTrait;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'body',
        'published_at',
        'image_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
