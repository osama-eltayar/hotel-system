<?php

namespace App\Sorts;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseSort
{
    protected Builder $query ;
    protected array $allowedSorts = [] ;

    private function __construct(Builder $query)
    {
        $this->query = $query ;
    }

    public static function make(Builder $builder,array $data): Builder
    {
        return (new static($builder))->applySorts($data)->getQuery();
    }

    protected function getQuery() :Builder
    {
        return $this->query ;
    }

    abstract protected function applySorts(array $data);
}
