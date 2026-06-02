<?php 


namespace App\Queries\Post;

use App\Contracts\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

final readonly class QueryByTag implements QueryFilter {

    public function __construct(
        private ?string $tag
    ){}

    public function apply(Builder $query): Builder
    {
        // dd($this->tag);
        return $query->when(
            $this->tag,
            fn ($query) => $query->whereHas(
                'tags',
                fn ($q) => $q->where('name', $this->tag)
            )
        );
    }
}