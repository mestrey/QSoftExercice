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
        $faker = \Faker\Factory::create('ru_RU');
        return [
            'slug' => 'article/' . $faker->word(),
            'title' => $faker->name,
            'description' => $faker->realText(50),
            'body' => $faker->realText(200),
            'published_at' => $faker->dateTime($max = 'now')
        ];
    }

    public function unPublished()
    {
        return $this->state(function (array $attributes) {
            return [
                'published_at' => null,
            ];
        });
    }
}
