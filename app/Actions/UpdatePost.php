<?php

namespace App\Actions;

use App\DTOs\Post\PostData;
use App\Models\Post;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Support\Facades\DB;

final class UpdatePost{
    public function __construct(#[CurrentUser()] protected User $user)
    {
        
    }

    public function update(PostData $data, Post $post){

        DB::transaction(function () use ($post, $data) {

        $attributes = [
            'title' => $data->title,
            'slug' => $data->slug,
            'description' => $data->description,
            'content' => $data->content,
            'status' => $data->status?->value,
        ];

        if ($data->blogImage) {
            $attributes['blog_image'] = $data->blogImage->store('post', 'public');
        }

        $post->update($attributes);

        $post->tags()->sync($data->tags);
    });
    }
} 