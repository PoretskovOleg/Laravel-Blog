<?php

namespace Database\Seeders;

use Database\Factories\AdminUserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        AdminUserFactory::new()->count(1)->create();
    }
}
