<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ArticleCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => Str::ucfirst(fake()->words(2, true))
        ];
    }
}
