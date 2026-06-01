<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $tagIds = Tag::pluck('id');

        Post::factory()
            ->count(10)
            ->create()
            ->each(function ($post) use ($tagIds) {
                $post->tags()->attach(
                    $tagIds->random(rand(1, 3))
                );
    });

    }
}
