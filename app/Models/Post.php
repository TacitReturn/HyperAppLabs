<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * @property string title
 */
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'published_at',
    ];

    protected $fillable = [
        'title', 'slug', 'description', 'content', 'image', 'video', 'published_at', 'category_id', 'user_id',
    ];

    /**
     * Deletes post image
     *
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * Check if post has a tag
     */
    public function hasTag($tagID): bool
    {
        return in_array($tagID, $this->tags->pluck('id')->toArray());
    }

    /**
     * Define relationship for user model
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    public static function boot()
    {
        static::created(function () {
            dd("Post Created");
        });
    }
}
