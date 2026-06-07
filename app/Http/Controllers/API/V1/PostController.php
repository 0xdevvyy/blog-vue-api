<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\CreatePost;
use App\Actions\UpdatePost;
use App\DTOs\Post\PostData;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\V1\PostCollection;
use App\Http\Resources\V1\PostResource;
use App\Models\Tag;
use App\Models\User;
use App\Queries\Post\PostQuery;
use App\Queries\Post\QueryByTag;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request,PostQuery $query) {

            //will do this in an action. and also need to get only the published post
            $posts = $query
            ->addFilter(
                new QueryByTag(
                    $request->query('tag')
                )//and also by this one if i want to add a filter class then i need to make new QueryByStatus() again 
                //and if i want to query by date then i need to add date also
            )
            ->build()
            ->where('status', 'published') //should i create a dedicated filter here?
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
        $tags = Tag::all();

        return view('post.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, CreatePost $action)
    {
        
        $dto = PostData::fromRequest($request);
        // dd($request->all());

        // dd($dto);
        $action->handle($dto);
        

        return to_route('auth.dashboard')->with('success', 'Successfully uploaded a Post');
        
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
        $tags = Tag::all();

        return view('post.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, UpdatePost $action, Post $post)
    {
        //store post request is just the same as update post request //nah its not the same hahahah there is other logic when updating 
        $dto = PostData::fromRequest($request);
        $action->update($dto, $post);

       return to_route('post.edit', $post)->with('success', 'Successfully Updated a Post');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        
        $post->delete();

        return redirect()
            ->route('auth.dashboard')
            ->with('success', 'Post deleted successfully.');
    }
}
