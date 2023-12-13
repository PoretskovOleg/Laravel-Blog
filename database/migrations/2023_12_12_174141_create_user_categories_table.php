<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('code')->nullable(false);
        });

        DB::table('user_categories')->insert([
            [
                'name' => 'Пользователь',
                'code' => 'User',
            ],
            [
                'name' => 'Автор',
                'code' => 'Author',
            ],
            [
                'name' => 'Администратор',
                'code' => 'Admin',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_categories');
    }
};
