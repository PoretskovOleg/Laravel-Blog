<?php

namespace Database\Seeders;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ArticleSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        if (!File::exists(storage_path('app/public/images/articles'))) {
            File::makeDirectory(storage_path('app/public/images/articles'));
        }

        ArticleFactory::new()->count(10)->create();
    }
}
