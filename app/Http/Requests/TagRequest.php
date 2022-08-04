<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        return [];
    }

    /**
     * Get a collection of Tag as string from the request's string of tags
     * 
     * @return \Illuminate\Support\Collection<string>
     */
    public function getCollection(string $tags)
    {
        $tagsArray = array_unique(array_filter(array_map('trim', explode(',', $tags)), function ($e) {
            return $e !== '';
        }));

        $tagsCollection = collect($tagsArray);

        return $tagsCollection;
    }
}
