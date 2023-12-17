<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Builder;
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
            'link' => fake()->url,
            'user_id' => User::query()
                ->whereHas('category', function (Builder $builder) {
                        $builder->where('code', 'Author');
                    }
                )->inRandomOrder()->value('id'),
            'article_category_id' => ArticleCategory::query()->inRandomOrder()->value('id')
        ];
    }
}
