<?php

namespace App\Http\Controllers;

use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\TagsRepositoryContract;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagRequest;
use App\Models\Image;
use App\Services\TagsSynchronizer;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function __construct(
        protected TagsSynchronizer $tagsSynchronizer,
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
            'articles' => $this->articleRepository->getPaginated(5)
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
    public function store(ArticleRequest $request, TagRequest $tagRequest)
    {
        $request->validated();
        $tags = $tagRequest->tagsCollection();

        $article = $this->articleRepository->create([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'published_at' => $request->isPublished(),
            'slug' => Str::slug($request->title),
            'image_id' => Image::factory()->create(['path' => $request->image ?? 'pictures/car_k5_1.png'])->id,
        ]);

        $this->tagsSynchronizer->sync($tags, $article);

        return redirect()->route('articles.show', $article)->with('success', 'Успешно создано!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        return view('pages.article', [
            'article' => $this->articleRepository->findBySlug($slug)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug)
    {
        return view('pages.edit', [
            'article' => $this->articleRepository->findBySlug($slug)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(string $slug, ArticleRequest $request, TagRequest $tagRequest)
    {
        $request->validated();
        $tags = $tagRequest->tagsCollection();
        $article = $this->articleRepository->findBySlug($slug);

        $this->articleRepository->update($article, [
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'published_at' => $request->isPublished(),
            'slug' => Str::slug($request->title)
        ]);

        $article->image()->associate(Image::factory()->create([
            'path' => $request->image ?? 'pictures/car_k5_1.png'
        ]));
        $article->save();

        $this->tagsSynchronizer->sync($tags, $article);

        return redirect()->route('articles.show', $article)->with('success', 'Успешно редактировано!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $slug)
    {
        $article = $this->articleRepository->findBySlug($slug);
        $this->articleRepository->delete($article);
        return redirect()->route('articles.index', $article)->with('success', 'Успешно удалено!');
    }
}
