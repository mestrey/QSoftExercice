<?php

namespace App\Http\Controllers;

use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\TagsRepositoryContract;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\TagRequest;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function __construct(
        protected TagsRepositoryContract $tagRepository,
        protected ArticlesRepositoryContract $articleRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.articles', [
            'articles' => $this->articleRepository->getAllLatestPublishedArticles()
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
    public function store(StoreArticleRequest $request, TagRequest $tagRequest)
    {
        $request->validated();
        $tags = $tagRequest->tagsCollection();

        $article = $this->articleRepository->createArticle([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'published_at' => $request->isPublished(),
            'slug' => Str::slug($request->title)
        ]);

        $this->tagRepository->sync($tags, $article);

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
    public function update(StoreArticleRequest $request, TagRequest $tagRequest, Article $article)
    {
        $request->validated();
        $tags = $tagRequest->tagsCollection();

        $this->articleRepository->updateArticle($article, [
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'published_at' => $request->isPublished(),
            'slug' => Str::slug($request->title)
        ]);

        $this->tagRepository->sync($tags, $article);

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
        $this->articleRepository->deleteArticle($article);
        return redirect()->route('articles.index', $article)->with('success', 'Успешно удалено!');
    }
}
