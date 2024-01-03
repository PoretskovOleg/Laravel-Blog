<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $preview_img
 * @property string $detail_img
 * @property int $category_id
 * @property ArticleCategory $category
 */
class Article extends Model
{
    use HasFactory;

    const CACHE_KEY_HOME_PAGE = 'articles_home_page';

    protected $fillable = [
        'title',
        'text',
        'preview_img',
        'detail_img',
        'category_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function previewImg():Attribute
    {
        return Attribute::get(
            fn($value) => '/storage/'.$value
        );
    }

    public function detailImg():Attribute
    {
        return Attribute::get(
            fn($value) => '/storage/'.$value
        );
    }

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(ArticleCategory::class);
    }
}
