<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => Str::ucfirst(fake()->words(3, true)),
            'text' => fake()->text(),
            'preview' => fake()->imageUrl(750, 300, null, true),
            'detail_preview' => fake()->imageUrl(1600, 1000, null, true),
            'category_id' => ArticleCategory::query()->inRandomOrder()->value('id')
        ];
    }
}
