<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

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

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function createdAtFormat():Attribute
    {
        return Attribute::get(
            fn($value, $attributes) => Carbon::parse($attributes['created_at'])->format('d.m.Y H:i')
        );
    }

    public function updatedAtFormat():Attribute
    {
        return Attribute::get(
            fn($value, $attributes) => Carbon::parse($attributes['updated_at'])->format('d.m.Y H:i')
        );
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'category_id');
    }
}
