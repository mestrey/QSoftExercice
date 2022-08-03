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
