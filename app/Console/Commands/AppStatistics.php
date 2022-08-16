<?php

namespace App\Console\Commands;

use App\Services\AppStatisticsService;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\TableSeparator;

class AppStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get interesting statistics about your app';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $stats = (new AppStatisticsService)->getStats();

        $mostTagged = $stats['mostTaggedArticle'];
        $longestArticle = $stats['longestArticle'];
        $longestArticleLength = strlen($longestArticle->body);
        $shortestArticle = $stats['shortestArticle'];
        $shortestArticleLength = strlen($shortestArticle->body);

        $this->table(['Имя', 'Значение'], [
            ['Общее количество машин', $stats['cars']],
            ['Общее количество новостей', $stats['articles']],
            ['Тег, у к-ого больше всего новостей', $stats['mostUsedTag']->name],
            [
                'Самая длинная новость',
                "{$longestArticle->title} (id {$longestArticle->id}): $longestArticleLength"
            ],
            [
                'Самая короткая новость',
                "{$shortestArticle->title} (id {$shortestArticle->id}): $shortestArticleLength"
            ],
            ['Средние количество новостей у тега', $stats['averageArticlePerTag']],
            [
                'Самая тегированная новость',
                "{$mostTagged->title} (id {$mostTagged->id}): {$mostTagged->tags->count()}"
            ],
        ], 'box-double');

        return 0;
    }
}
