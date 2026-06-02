<?php 

namespace App\Queries\Post;

use App\Models\Post;
// use App\Queries\AbstractQueryBuilder;
use App\Queries\AbstractQueryFilter;

class PostQuery extends AbstractQueryFilter{
    public function __construct()
    {
        parent::__construct(
            Post::class,
            ['*']
        );
    }
}