<?php

namespace App\Contracts;

interface SalonsClientServiceContract
{
    public function __construct(string $login, string $password, string $baseUrl);
    public function get(bool $inRandomOrder = false, int $limit = 0);
}
