<?php

namespace App\Repositories;

use App\Contracts\SalonsClientRepositoryContract;
use App\Contracts\SalonsClientServiceContract;
use App\Models\Salon;
use App\Services\SalonsClientService;
use Illuminate\Support\Facades\Cache;

class SalonsClientRepository implements SalonsClientRepositoryContract
{
    private SalonsClientServiceContract $salonsClientService;

    public function __construct()
    {
        $this->salonsClientService = new SalonsClientService(
            env('SALON_API_LOGIN', 'student'),
            env('SALON_API_PASSWORD', 'password'),
            env('SALON_API_URL', 'http://127.0.0.1:8001/api/v1/salons'),
        );
    }

    public function getAll()
    {
        $salons = Cache::remember('salons_all', 3600, function () {
            return $this->salonsClientService->getAll();
        });

        if ($salons['success']) {
            $result = array_map(function ($salon) {
                return Salon::createFromArray($salon);
            }, $salons['salons']);
            return $result;
        } else {
            return null;
        }
    }

    public function getTwoRandom()
    {
        $salons = Cache::remember('salons_two_rand', 300, function () {
            return $this->salonsClientService->getTwoRandom();
        });

        if ($salons['success']) {
            return [
                Salon::createFromArray($salons['salons'][0]),
                Salon::createFromArray($salons['salons'][1]),
            ];
        } else {
            return null;
        }
    }
}
