<?php

namespace App\Http\Controllers;

use App\Contracts\ArticleCreateServiceContract;
use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\ArticleUpdateServiceContract;
use App\Events\ArticleCreated;
use App\Events\ArticleDeleted;
use App\Events\ArticleUpdated;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        ArticlesRepositoryContract $articleRepository
    ) {
        $page = $request->has('page') ? $request->query('page') : 1;
        return view('pages.articles', [
            'articles' => $articleRepository->getPaginated(5, $page)
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
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        ArticleRequest $request,
        TagRequest $tagRequest,
        ArticleCreateServiceContract $articleCreateService
    ) {
        if ($request->user()->cannot('create', Article::class)) {
            abort(403);
        }

        $article = $articleCreateService->create(
            $request->validated(),
            $tagRequest->tagsCollection(),
            $request->isPublished(),
            $request->file('image')
        );

        event(new ArticleCreated($article));

        return redirect()->route('articles.show', $article)->with('success', 'Успешно создано!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug, ArticlesRepositoryContract $articleRepository)
    {
        return view('pages.article', [
            'article' => $articleRepository->findBySlug($slug)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug, ArticlesRepositoryContract $articleRepository)
    {
        return view('pages.edit', [
            'article' => $articleRepository->findBySlug($slug)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(
        string $slug,
        ArticleRequest $request,
        TagRequest $tagRequest,
        ArticlesRepositoryContract $articleRepository,
        ArticleUpdateServiceContract $articleUpdateService
    ) {
        $request->validated();
        $article = $articleRepository->findBySlug($slug);

        if ($request->user()->cannot('update', Article::class)) {
            abort(403);
        }

        $article = $articleUpdateService->update(
            $articleRepository->findBySlug($slug),
            $request->validated(),
            $tagRequest->tagsCollection(),
            $request->file('image')
        );

        event(new ArticleUpdated($article));

        return redirect()->route('articles.show', $article)->with('success', 'Успешно редактировано!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $slug, Request $request, ArticlesRepositoryContract $articleRepository)
    {
        if ($request->user()->cannot('delete', Article::class)) {
            abort(403);
        }

        $article = $articleRepository->findBySlug($slug);
        $articleRepository->delete($article);

        event(new ArticleDeleted($article));

        return redirect()->route('articles.index', $article)->with('success', 'Успешно удалено!');
    }
}
