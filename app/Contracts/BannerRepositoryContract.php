<?php

namespace App\Contracts;

interface BannerRepositoryContract
{
    public function getRandom(int $count);
}
