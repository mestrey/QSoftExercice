<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class PagesController extends BaseController
{
    public function index()
    {
        $articles = DB::table('articles')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->get()
            ->take(3);

        return view('pages.homepage', [
            'articles' => $articles
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
