<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Post $post, #[CurrentUser()] User $user)
    {
        // $posts = $post::paginate(10);
        $posts = Auth::user()
            ->posts()
            ->latest()
            ->paginate(3);
      
        $draftCount = $user
            ->posts()
            ->where('status', 'draft')
            ->count();
        $archivePost = Auth::user()
            ->posts()
            ->where('status', 'archive')
            ->count();
            $publishedPost = Auth::user()
            ->posts()
            ->where('status', 'published')
            ->count();
        return view('dashboard.index', [
            'posts' => $posts,
            'archivePost' => $archivePost,
            'draftCount' => $draftCount,
            'publishCount' => $publishedPost,
        ]);
    }
}
