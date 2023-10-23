<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    // protected $dateFormat = 'Y-m-d\TH:i:s.000000\Z';
    protected $fillable = ['name', 'body'];

    /**
     * Get the user that owns the article.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the comments of the article.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(ArticleComment::class);
    }
}
