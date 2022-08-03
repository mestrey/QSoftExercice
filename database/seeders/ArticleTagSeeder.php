<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Article::get();
        $tags = Tag::get();

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
