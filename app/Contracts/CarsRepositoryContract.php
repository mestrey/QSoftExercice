<?php

namespace App\Contracts;

interface CarsRepositoryContract
{
    public function getAllCars();
    public function getAllFeaturedCars();
    public function getNewCars(int $count);
}
