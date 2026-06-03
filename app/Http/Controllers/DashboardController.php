<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Post $post)
    {
        // $posts = $post::paginate(10);
        $posts = Auth::user()
            ->post()
            ->paginate();
      
        $draftCount = Auth::user()
            ->post()
            ->where('status', 'draft')
            ->count();
        $archivePost = Auth::user()
            ->post()
            ->where('status', 'archive')
            ->count();
        return view('dashboard.index', [
            'posts' => $posts,
            'archivePost' => $archivePost,
            'draftCount' => $draftCount,
        ]);
    }
}
