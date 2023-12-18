<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $preview
 * @property string $detail_preview
 * @property string $link
 * @property User $user
 * @property ArticleCategory $category
 * @property Collection<ArticleImage> $images
 */
class Article extends Model
{
    use HasFactory;

    const CACHE_KEY_HOME_PAGE = 'articles_home_page';

    protected $fillable = [
        'name',
        'text',
        'preview',
        'detail_preview',
        'link',
        'user_id',
        'article_category_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ArticleImage::class);
    }
}
