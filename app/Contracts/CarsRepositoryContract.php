<?php

namespace App\Contracts;

interface CarsRepositoryContract
{
    public function getAllCars();
    public function getPaginatedCars(int $page);
    public function getAllFeaturedCars();
    public function getNewCars(int $count);
}
