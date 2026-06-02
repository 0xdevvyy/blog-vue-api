<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $tags = Tag::all();
        $posts = Post::all();

        $tagIds = Tag::pluck('id');

        $posts->each(function ($post) use ($tagIds) {
            $post->tags()->attach(
                $tagIds->random()
            );
        });
    }
}
