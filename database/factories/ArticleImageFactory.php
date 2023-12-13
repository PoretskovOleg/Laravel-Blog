<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;


class ArticleImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'path' => fake()->imageUrl(600, 600, null, false),
            'sort' => fake()->numberBetween(1, 20),
            'article_id' => Article::query()->inRandomOrder()->value('id')
        ];
    }
}
