<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface HasTags
{
    public function tags(): MorphToMany;
}
