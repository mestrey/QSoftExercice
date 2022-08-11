<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Image;
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
        return [
            'slug' => $this->faker->unique->slug(3),
            'title' => $this->faker->name,
            'description' => $this->faker->realText(50),
            'body' => $this->faker->realText(200),
            'published_at' => $this->faker->boolean(50) ? $this->faker->dateTime('now') : null,
            'image_id' => Image::factory()->create()
        ];
    }

    public function published()
    {
        return $this->state(function () {
            return [
                'published_at' => $this->faker->dateTime('now'),
            ];
        });
    }
}
