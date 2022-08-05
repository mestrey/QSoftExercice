<?php

namespace App\Contracts;

interface CarsRepositoryContract
{
    public function get();
    public function getPaginated(int $page);
    public function getFeatured();
    public function getNew(int $count);
}
