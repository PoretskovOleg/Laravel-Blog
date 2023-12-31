<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $preview
 * @property string $detail_preview
 * @property ArticleCategory $category
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
        'category_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ArticleCategory::class);
    }
}
