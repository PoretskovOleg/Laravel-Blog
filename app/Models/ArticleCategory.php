<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property Collection<Article> $articles
 */
class ArticleCategory extends Model
{
    use HasFactory;

    const CACHE_KEY_DEFAULT_CATEGORY = 'default_category';
    const CACHE_KEY_CATEGORIES = 'article_categories';

    protected $fillable = ['name'];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
