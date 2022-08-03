<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Car;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class PagesController extends BaseController
{
    public function index()
    {
        $articles = Article::whereNotNull('published_at')
            ->latest('published_at')
            ->take(3)
            ->get();

        $cars = Car::where('is_new', 0)
            ->take(4)
            ->get();

        return view('pages.homepage', [
            'articles' => $articles,
            'cars' => $cars
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function client()
    {
        $cars = Car::with('carEngine', 'carClass')->get();

        $averagePrice = $cars->avg('price');
        dump($averagePrice);

        $averagePriceDiscounted = $cars->whereNotNull('old_price')->avg('price');
        dump($averagePriceDiscounted);

        $mostExpensive = $cars->max('price');
        dump($mostExpensive);

        $salons = $cars->pluck('salon');
        dump($salons);

        $engines = $cars->pluck('carEngine.name')->sort();
        dump($engines);

        $classes = $cars->pluck('carClass.name')->keyBy(function ($value, $key) {
            return Str::slug($value);
        })->sort();
        dump($classes);

        $discounted = $cars->whereNotNull('old_price')->reject(function ($e) {
            $str = $e->name . $e->carEngine->name . $e->kpp;
            return !str_contains($str, '5') && !str_contains($str, '6');
        });
        dump($discounted);

        $bodies = $cars->whereNull('old_price')->pluck('car_body_id', 'carBody.name')->map(function ($e) use ($cars) {
            return $cars->where('car_body_id', $e)->avg('price');
        })->sort();
        dump($bodies);

        return view('pages.client');
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
