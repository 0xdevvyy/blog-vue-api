<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(#[CurrentUser()] User $user)
    {
        // $posts = $post::paginate(10);
        $posts = $user
            ->posts()
            ->latest()
            ->paginate(3);
      
        $draftCount = $user
            ->posts()
            ->where('status', 'draft')
            ->count();
        $archivePost = $user
            ->posts()
            ->where('status', 'archive')
            ->count();
            $publishedPost = $user
            ->posts()
            ->where('status', 'published')
            ->count();

            $tags = Tag::withCount('posts')
            ->orderBy('name')
            ->get();
        return view('dashboard.index', [
            'posts' => $posts,
            'tags' => $tags,
            'archivePost' => $archivePost,
            'draftCount' => $draftCount,
            'publishCount' => $publishedPost,
        ]);
    }
}
