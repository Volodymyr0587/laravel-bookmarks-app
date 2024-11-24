<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Bookmark extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'url',
        'image',
    ];

    /**
     * Get the user that owns the Bookmark
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearchBookmarkByNameOrUrl(Builder $query, $searchTerm)
    {
        if ($searchTerm) {
            return $query->where(function ($q) use ($searchTerm) {
                $q->whereAny(
                    [
                        'name', 'url',
                    ],
                    'LIKE',
                    '%' . $searchTerm . '%'
                );
            });
        }

        return $query;
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function generateSlug()
    {
        $slug = Str::slug($this->name);
        $count = static::where('slug', 'LIKE', "{$slug}%")->count();
        $this->slug = $count ? "{$slug}-{$count}" : $slug;
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($bookmark) {
            $bookmark->generateSlug();

            if (request()->hasFile('image')) {
                if ($bookmark->getOriginal('image')) {
                    Storage::disk('public')->delete($bookmark->getOriginal('image'));
                }
            }
        });

        static::deleting(function ($bookmark) {
            if ($bookmark->image) {
                Storage::disk('public')->delete($bookmark->image);
            }
        });
    }
}
