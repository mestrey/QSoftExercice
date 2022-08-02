<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Car;
use Illuminate\Routing\Controller as BaseController;

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
