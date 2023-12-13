<?php

namespace Database\Factories;

use App\Models\UserCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'user_category_id' => UserCategory::query()->inRandomOrder()->value('id'),
            'avatar' => fake()->imageUrl(100, 100, null, false)
        ];
    }
}
