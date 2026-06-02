<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\V1\PostCollection;
use App\Http\Resources\V1\PostResource;
use App\Queries\Post\PostQuery;
use App\Queries\Post\QueryByTag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request,PostQuery $query) {


            $posts = $query
            ->addFilter(
                new QueryByTag(
                    $request->query('tag')
                )
            )
            ->build()
            ->with('tags')
            ->latest()
            ->paginate();

        // dd($request->tag);

            return new PostCollection($posts);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
         return new PostResource(
            $post->load('tags')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
