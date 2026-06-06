<?php 

namespace App\DTOs\Post;

use App\Http\Requests\StorePostRequest;
use App\Status;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

readonly class PostData{

    public function __construct(
        public string $title,
        public string $slug,
        public string $description,
        public string $content,
        public ?UploadedFile $blogImage,
        public ?Status $status,
        public array $tags,
        // public ?Carbon $createdAt,
    ){

    }

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            title: $request->validated('title'),
            slug: $request->validated('slug'),
            description: $request->validated('description'),
            content: $request->validated('content'),
            blogImage: $request->file('blog_image'),
            status: $request->filled('status')
                ? Status::from($request->validated('status'))
                : null,
            tags: $request->validated('tags', []),
        );
    }

}