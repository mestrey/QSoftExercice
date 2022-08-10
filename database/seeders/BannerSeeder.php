<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::factory()->create([
            'title' => 'Купи Астон Мартин, получи секретное Задание',
            'description' => 'Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире',
            'link' => '',
            'image_id' => Image::factory()->create([
                'path' => 'pictures/test_banner_1.jpg'
            ])
        ]);

        Banner::factory()->create([
            'title' => 'Купи Роллс Ройс, получи Отчество к своему имени',
            'description' => 'Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире',
            'link' => '',
            'image_id' => Image::factory()->create([
                'path' => 'pictures/test_banner_2.jpg'
            ])
        ]);

        Banner::factory()->create([
            'title' => 'Купи Бентли, получи бейсболку',
            'description' => 'Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире',
            'link' => '',
            'image_id' => Image::factory()->create([
                'path' => 'pictures/test_banner_3.jpg'
            ])
        ]);
    }
}
