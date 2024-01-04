<?php

use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false)->comment('Название статьи');
            $table->text('text')->nullable(false)->comment('Текст статьи');
            $table->string('preview_img')->nullable()->comment('Обложка статьи маленькая');
            $table->string('detail_img')->nullable()->comment('Обложка статьи большая');
            $table->foreignId('category_id')
                ->nullable(false)
                ->comment('Категория статьи')
                ->constrained('article_categories')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
