<?php

namespace App\Http\Controllers;

use App\Contracts\CarsRepositoryContract;
use App\Contracts\CategoryRepositoryContract;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(
        protected CarsRepositoryContract $carsRepository,
        protected CategoryRepositoryContract $categoryRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->query('page') : 1;
        $cars = $this->carsRepository->getPaginated(16, $page);

        return view('pages.catalog', [
            'cars' => $cars
        ]);
    }

    public function category(string $slug, Request $request)
    {
        $page = $request->has('page') ? $request->query('page') : 1;
        $category = $this->categoryRepository->findBySlug($slug);
        $cars = $this->carsRepository->getByCategoryPaginated($category->id, 16, $page);
        $category->children->each(function ($child) use ($cars) {
            $this->carsRepository->getByCategory($child->id)->each(function ($car) use ($cars) {
                $cars->add($car);
            });
        });

        return view('pages.catalog', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return view('pages.car', [
            'car' => $this->carsRepository->findById($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
