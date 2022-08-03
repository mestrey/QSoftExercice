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
        $taggables = [Article::class];

        $taggableType = $this->faker->randomElement($taggables);
        $taggable = $this->factoryForModel($taggableType)->create();

        return [
            'taggable_type' => $taggableType,
            'taggable_id' => $taggable->id,
            'name' => $this->faker->unique()->word()
        ];
    }
}
