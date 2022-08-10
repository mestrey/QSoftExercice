<?php

namespace App\Http\Requests;

use App\Contracts\ArticlesRepositoryContract;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(ArticlesRepositoryContract $articlesRepository)
    {
        $articleId = $this->article ? $articlesRepository->findBySlug($this->article)->id : null;
        return [
            'title' => 'bail|required|max:255|unique:articles' . ($articleId ? ",title,{$articleId}" : ''),
            'description' => 'required|max:255',
            'body' => '',
            'image' => 'required',
        ];
    }

    public function isPublished()
    {
        return (bool)$this->published ? Carbon::now() : null;
    }
}
