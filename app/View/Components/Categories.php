<?php

namespace App\View\Components;

use App\Repositories\CategoryRepository;
use Illuminate\View\Component;

class Categories extends Component
{
    public $categories;
    public $categoryRepository;
    public $parent;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository;
        $this->categories = $this->categoryRepository->getRoots();

        $currentSlug = last(request()->segments());

        if (count(request()->segments()) > 1 && request()->segments()[0] == 'catalog') {
            $current = $this->categoryRepository->findBySlug($currentSlug);
            $this->parent = $current->parent;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panels.categories');
    }
}
