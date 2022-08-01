<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::whereNotNull('published_at')
            ->latest('published_at')
            ->get();

        return view('pages.articles', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    private function slugify($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        if (function_exists('transliterator_transliterate')) $text = transliterator_transliterate('Any-Latin; Latin-ASCII', $text);
        $text = iconv('utf-8', 'ASCII//TRANSLIT//IGNORE', $text);
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);

        return $text;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|unique:articles|max:255',
            'description' => 'required|max:255'
        ]);

        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'published_at' => (bool)$request->published ? Carbon::now() : null,
            'slug' => $this->slugify($request->title)
        ]);

        return redirect()->route('articles.show', $article)->with('created', 'Успешно создано!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('pages.article', [
            'article' => $article
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
