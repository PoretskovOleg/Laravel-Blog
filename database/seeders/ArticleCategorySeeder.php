<?php

namespace Database\Seeders;

use Database\Factories\ArticleCategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        ArticleCategoryFactory::new()->count(3)->create();
    }
}
