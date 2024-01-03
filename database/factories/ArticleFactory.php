<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $dir = 'images/articles/';
        $pathDir = 'public/storage/'.$dir;
        return [
            'title' => Str::ucfirst(fake()->words(3, true)),
            'text' => fake()->text(),
            'preview_img' => $dir.fake()->image($pathDir,750, 300, null, false),
            'detail_img' => $dir.fake()->image($pathDir,1600, 1000, null, false),
            'category_id' => ArticleCategory::query()->inRandomOrder()->value('id')
        ];
    }
}
