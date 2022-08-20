<?php

namespace App\View\Components;

use App\Contracts\SalonsClientRepositoryContract;
use Illuminate\View\Component;

class Salons extends Component
{
    public $salons;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SalonsClientRepositoryContract $salonsClientRepository)
    {
        $this->salons = $salonsClientRepository->getTwoRandom();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panels.salons');
    }
}
