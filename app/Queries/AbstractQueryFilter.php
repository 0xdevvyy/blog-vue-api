<?php

declare(strict_types=1);

namespace App\Queries;

use App\Contracts\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\Model;


abstract class AbstractQueryFilter
{
   
    protected array $filters = [];

   
    public function __construct(
        protected string $modelClass, 
        protected array $columns
    ) {}

  
    final public function addFilter(QueryFilter $filter): self
    {
        $this->filters[] = $filter;

        return $this;
    }

   
    final public function setSelectColumns(array $columns): self
    {
        $this->columns = $columns;

        return $this;
    }

   
    final public function build(): Builder
    {
       
        $query = $this->modelClass::query()->select($this->columns);

        foreach ($this->filters as $queryFilter) {
            $query = $queryFilter->apply($query);
        }

        return $query;
    }
}