<?php

namespace App\Http\Controllers;

use App\Contracts\CarsRepositoryContract;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Http\Resources\CarResourceCollection;

class CarApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CarsRepositoryContract $carsRepository)
    {
        return new CarResourceCollection($carsRepository->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request, CarsRepositoryContract $carRepository)
    {
        $car = $carRepository->create($request->validated());
        return [
            'success' => true,
            'car_id' => $car->id,
            'car' => new CarResource($car)
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, int $id, CarsRepositoryContract $carRepository)
    {
        try {
            $car = $carRepository->findById($id);
        } catch (\Throwable $th) {
            return [
                'success' => false,
                'error' => "Car with id:$id not found"
            ];
        }

        $success = $carRepository->update($car, $request->validated());

        return [
            'success' => $success,
            'car_id' => $car->id
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, CarsRepositoryContract $carRepository)
    {
        try {
            $car = $carRepository->findById($id);
        } catch (\Throwable $th) {
            return [
                'success' => false,
                'error' => "Car with id:$id not found"
            ];
        }

        $carRepository->delete($car);

        return [
            'success' => true,
            'car_id' => $car->id,
        ];
    }
}
