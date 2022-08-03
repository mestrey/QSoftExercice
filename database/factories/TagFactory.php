<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $taggable = Article::get()->random();

        return [
            'taggable_type' => Article::class,
            'taggable_id' => $taggable->id,
            'name' => $this->faker->unique()->word()
        ];
    }
}
