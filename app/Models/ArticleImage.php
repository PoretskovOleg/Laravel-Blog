<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $path
 * @property int $sort
 * @property Article $article
 */
class ArticleImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'sort',
        'article_id'
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}