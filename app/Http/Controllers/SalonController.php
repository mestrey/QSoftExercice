<?php

namespace App\Http\Controllers;

use App\Contracts\SalonsClientRepositoryContract;

class SalonController extends Controller
{
    public function index(SalonsClientRepositoryContract $salonsClientRepository)
    {
        $salons = $salonsClientRepository->getAll();

        return view('pages.salons', [
            'salons' => $salons
        ]);
    }
}
