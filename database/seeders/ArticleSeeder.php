<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()
            ->count(5)
            ->published()
            ->create();

        Article::factory()
            ->count(5)
            ->create();

        $articles = Article::get();
        $tags = Tag::factory()
            ->count(20)
            ->create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('taggables')->updateOrInsert(
                [
                    'tag_id' => $tags->random()->id,
                    'taggable_id' => $articles->random()->id,
                    'taggable_type' => Article::class
                ]
            );
        }
    }
}
