<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $light = Category::factory()->create([
            'name' => 'Легковые',
            'slug' => 'light',
            'sort' => 0
        ]);

        $light->children()->saveMany([
            Category::factory()->create([
                'name' => 'Седан',
                'slug' => 'sedan',
                'sort' => 0
            ]),
            Category::factory()->create([
                'name' => 'Хетчбеки',
                'slug' => 'hatchbacks',
                'sort' => 1
            ]),
            Category::factory()->create([
                'name' => 'Универсалы',
                'slug' => 'universals',
                'sort' => 2
            ]),
            Category::factory()->create([
                'name' => 'Купе',
                'slug' => 'coupe',
                'sort' => 3
            ]),
            Category::factory()->create([
                'name' => 'Родстеры',
                'slug' => 'roadsters',
                'sort' => 4
            ]),
        ]);

        $suv = Category::factory()->create([
            'name' => 'Внедорожники',
            'slug' => 'suv',
            'sort' => 1
        ]);

        $suv->children()->saveMany([
            Category::factory()->create([
                'name' => 'Рамные',
                'slug' => 'frames',
                'sort' => 0
            ]),
            Category::factory()->create([
                'name' => 'Пикапы',
                'slug' => 'pickup',
                'sort' => 1
            ]),
            Category::factory()->create([
                'name' => 'Кроссоверы',
                'slug' => 'crossovers',
                'sort' => 2
            ]),
        ]);

        $rarities = Category::factory()->create([
            'name' => 'Раритетные',
            'slug' => 'rarities',
            'sort' => 2
        ]);

        $sale = Category::factory()->create([
            'name' => 'Распродажа',
            'slug' => 'sale',
            'sort' => 3
        ]);

        $novelties = Category::factory()->create([
            'name' => 'Новинки',
            'slug' => 'novelties',
            'sort' => 4
        ]);
    }
}
