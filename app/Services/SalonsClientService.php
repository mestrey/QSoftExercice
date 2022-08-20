<?php

namespace App\Services;

use App\Contracts\SalonsClientServiceContract;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
{
    public function __construct(
        private string $login,
        private string $password
    ) {
    }

    public function getAll()
    {
        return Http::acceptJson()
            ->withBasicAuth($this->login, $this->password)
            ->get('http://127.0.0.1:8001/api/v1/salons')
            ->json();
    }

    public function getTwoRandom()
    {
        return Http::acceptJson()
            ->withBasicAuth($this->login, $this->password)
            ->get('http://127.0.0.1:8001/api/v1/salons?limit=2&in_random_order')
            ->json();
    }
}
