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
            env('SALON_API_LOGIN'),
            env('SALON_API_PASSWORD'),
            env('SALON_API_URL'),
        );
    }

    public function getAll()
    {
        // $salons = Cache::remember('salons_all', 3600, function () {
        //     return $this->salonsClientService->get();
        // });

        $salons = $this->salonsClientService->get();

        if (!isset($salons['message'])) {
            $result = array_map(function ($salon) {
                return Salon::createFromArray($salon);
            }, $salons);
            return $result;
        } else {
            return null;
        }
    }

    public function getTwoRandom()
    {
        // $salons = Cache::remember('salons_two_rand', 300, function () {
        //     return $this->salonsClientService->get(true, 2);
        // });

        $salons = $this->salonsClientService->get(true, 2);

        if (!isset($salons['message'])) {
            return [
                Salon::createFromArray($salons[0]),
                Salon::createFromArray($salons[1]),
            ];
        } else {
            return null;
        }
    }
}
