<?php

namespace App\Services;

use App\Contracts\SalonsClientServiceContract;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
{
    public function __construct(
        private string $login,
        private string $password,
        private string $baseUrl,
    ) {
    }

    public function getAll()
    {
        return Http::acceptJson()
            ->withBasicAuth($this->login, $this->password)
            ->get($this->baseUrl)
            ->json();
    }

    public function getTwoRandom()
    {
        return Http::acceptJson()
            ->withBasicAuth($this->login, $this->password)
            ->get($this->baseUrl . '?limit=2&in_random_order')
            ->json();
    }
}
