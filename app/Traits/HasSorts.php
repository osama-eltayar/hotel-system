<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use ReflectionClass;

trait HasSorts
{
    protected $sortNameSpace = 'App\\Sorts\\';

    protected function getSortClass()
    {
        return $this->sortNameSpace . $this->getModelClassName() . 'Sort';
    }

    protected function getModelClassName()
    {
        return (new ReflectionClass($this))->getShortName();
    }

    public function scopeSort(Builder $query, array $sortData)
    {
        return $this->getSortClass()::make($query, $sortData);
    }

}
