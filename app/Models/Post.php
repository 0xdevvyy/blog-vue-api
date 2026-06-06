<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(
    [
        'title',
        'slug',
        'description',
        'content',
        'blog_image',
        'status',
    ]
)]
#[Hidden('id', 'user_id')]

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;


    protected $casts = [
        'status' => Status::class,
    ];

    protected $attributes = [
        'status' => Status::PUBLISHED,
    ];



    public function user(): BelongsTo{
        return $this->belongsTo(User::class);   
    }

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
