<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class StoreArticleRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'bail|required|max:255|unique:articles' . ($this->article ? ",title,{$this->article->id}" : ''),
            'description' => 'required|max:255'
        ];
    }

    public function isPublished()
    {
        return (bool)$this->published ? Carbon::now() : null;
    }
}
