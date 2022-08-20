<?php

namespace App\Contracts;

interface SalonsClientServiceContract
{
    public function __construct(string $login, string $password);
    public function getAll();
    public function getTwoRandom();
}
