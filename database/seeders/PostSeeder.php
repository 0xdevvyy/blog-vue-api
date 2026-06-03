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
            ->count(1)
            ->create();

        // Post::factory()
        //     ->count(10)
        //     ->create();

        // Post::factory()
        //     ->count(20)
        //     ->hasAttached(
        //         Tag::factory()->count(1)
        //     )
        //     ->create();
            
    }

    
}
