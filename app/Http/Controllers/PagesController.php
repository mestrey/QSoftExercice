<?php

namespace App\Http\Controllers;

use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\BannerRepositoryContract;
use App\Contracts\CarsRepositoryContract;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class PagesController extends BaseController
{
    public function __construct(
        protected ArticlesRepositoryContract $articlesRepository,
        protected CarsRepositoryContract $carsRepository,
        protected BannerRepositoryContract $bannerRepository
    ) {
    }

    public function index()
    {
        $articles = $this->articlesRepository->get(3);
        $cars = $this->carsRepository->getNew(4);
        $banners = $this->bannerRepository->getRandom(3);

        return view('pages.homepage', [
            'articles' => $articles,
            'cars' => $cars,
            'banners' => $banners
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function client()
    {
        $cars = $this->carsRepository->getFeatured();

        $averagePrice = $cars->avg('price');
        $averagePriceDiscounted = $cars->whereNotNull('old_price')->avg('price');
        $mostExpensive = $cars->max('price');

        $salons = $cars->pluck('salon');
        $engines = $cars->pluck('carEngine.name')->sort();

        $classes = $cars->pluck('carClass.name')->keyBy(function ($value, $key) {
            return Str::slug($value);
        })->sort();

        $discounted = $cars->whereNotNull('old_price')->reject(function ($e) {
            $str = $e->name . $e->carEngine->name . $e->kpp;
            return !str_contains($str, '5') && !str_contains($str, '6');
        });

        $bodies = $cars->whereNull('old_price')->pluck('car_body_id', 'carBody.name')->map(function ($e) use ($cars) {
            return $cars->where('car_body_id', $e)->avg('price');
        })->sort();

        return view('pages.client', [
            'averagePrice' => $averagePrice,
            'averagePriceDiscounted' => $averagePriceDiscounted,
            'mostExpensive' => $mostExpensive,
            'salons' => $salons,
            'engines' => $engines,
            'classes' => $classes,
            'discounted' => $discounted,
            'bodies' => $bodies,
        ]);
    }

    public function condition()
    {
        return view('pages.condition');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function finance()
    {
        return view('pages.finance');
    }
}
