<?php 

namespace App\DTOs\Post;

use App\Status;
use Carbon\Carbon;

readonly class PostData{

    public function __construct(
        public string $title,
        public string $slug,
        public string $description,
        public string $content,
        public string $blogImage,
        public ?Status $status,
        public ?Carbon $createdAt,
    ){

    }

}