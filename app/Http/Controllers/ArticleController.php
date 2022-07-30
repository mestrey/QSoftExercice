<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function getArticles()
    {
        $articles = DB::table('articles')
            ->latest('published_at')
            ->get()
            ->take(3);

        return $articles;
    }
}
