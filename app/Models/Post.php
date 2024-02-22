<?php

namespace App\Models;

use App\Models\Traits\FilterableByDates;
use App\Models\Traits\HasUuidPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory, HasUuidPrimaryKey, FilterableByDates;


    protected $fillable = [
        'id',
        'content',
        'title',
        'author',
        'category_id'
    ];

    public static function mediaDir(): string
    {
        return 'posts';
    }

    public static function mediaDisk(): string
    {
        return config('filesystems.media');
    }

    public function media(): MorphOne
    {
        return $this->morphOne(Media::class, 'model')
        ->where('description', 'thumbnail');
    }

    public function category():BelongsTo{
        return $this->belongsTo(BlogCategory::class);
    }
}
