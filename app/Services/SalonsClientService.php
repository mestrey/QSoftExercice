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

    public function get(bool $inRandomOrder = false, int $limit = 0)
    {
        return Http::acceptJson()
            ->withBasicAuth($this->login, $this->password)
            ->get(
                $this->baseUrl . '?' .
                    ($inRandomOrder ? 'in_random_order&' : '') .
                    ($limit > 0 ? "limit=$limit" : '')
            )
            ->json();
    }
}
