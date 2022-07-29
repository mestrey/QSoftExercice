<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->unique()->word;
        return [
            'slug' => 'article/' . $title,
            'title' => $title,
            'description' => fake()->text(50),
            'body' => fake()->text(200),
            'published_at' => fake()->dateTime($max = 'now')
        ];
    }
}
