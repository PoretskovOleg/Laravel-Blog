<?php

namespace Database\Seeders;

use Database\Factories\ArticleImageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleImageSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        ArticleImageFactory::new()->count(50)->create();
    }
}
