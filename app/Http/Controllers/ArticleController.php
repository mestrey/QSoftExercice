<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\TagRequest;
use App\Services\TagsSynchronizer;
use Illuminate\Support\Str;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $request->validated();
        $tags = $request->tags ? (new TagRequest)->getCollection($request->tags) : collect();

        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'published_at' => $request->isPublished(),
            'slug' => Str::slug($request->title)
        ]);

        (new TagsSynchronizer())->sync($tags, $article);

        return redirect()->route('articles.show', $article)->with('success', 'Успешно создано!');
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
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('pages.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleRequest $request, Article $article)
    {
        $request->validated();
        $tags = $request->tags ? (new TagRequest)->getCollection($request->tags) : collect();

        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->description = $request->description;
        $article->body = $request->body;
        $article->published_at = $request->isPublished();

        $article->save();

        (new TagsSynchronizer())->sync($tags, $article);

        return redirect()->route('articles.show', $article)->with('success', 'Успешно редактировано!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index', $article)->with('success', 'Успешно удалено!');
    }
}
