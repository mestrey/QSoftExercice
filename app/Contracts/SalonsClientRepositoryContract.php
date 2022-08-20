<?php

namespace App\Contracts;

interface SalonsClientRepositoryContract
{
    public function getAll();
    public function getTwoRandom();
}
