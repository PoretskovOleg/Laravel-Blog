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
            $table->string('name')->nullable(false)->comment('Название статьи');
            $table->text('text')->nullable(false)->comment('Текст статьи');
            $table->string('preview')->comment('Обложка статьи маленькая');
            $table->string('detail_preview')->comment('Обложка статьи большая');
            $table->foreignIdFor(User::class)
                ->nullable(false)
                ->comment('Автор статьи')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignIdFor(ArticleCategory::class)
                ->nullable(false)
                ->comment('Категория статьи')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('link')->comment('Ссылка на первоисточник');
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
