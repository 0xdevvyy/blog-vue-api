<?php


namespace App\Actions;

use App\DTOs\Post\PostData;
use App\Models\Post;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Support\Facades\DB;

final class CreatePost {

    public function __construct(#[CurrentUser()] protected User $user)
    {
        
    }


    public function handle(PostData $data){
        // $imagePath = $data->blogImage->store('post', 'public');
        // dd($imagePath);
        // dd($data);
       
        DB::transaction(function () use ($data) {
            $imagePath = $data->blogImage->store('post', 'public');
            $post = $this->user->post()->create([
                'title' => $data->title,
                'slug' => $data->slug,
                'description' => $data->description,
                'content' => $data->content,
                'blog_image' => $imagePath,
                'status' => $data->status?->value,
            ]);
            $post->tags()->sync($data->tags);
        });
    }
}