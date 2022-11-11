<?php

namespace App\Sorts;

use Illuminate\Support\Arr;

class HotelSort extends BaseSort
{

    protected array $allowedSorts = ['price', 'name', 'country_code', 'city_id'];

    protected function applySorts(array $data)
    {
        foreach ($data as $singleSort) {
            if ( ($column = Arr::get($singleSort, 'column')) && in_array($column, $this->allowedSorts))
                $this->sort($column, Arr::get($singleSort, 'type'));
        }

        return $this;
    }

    protected function sort($column, $type)
    {
        $this->query->orderBy($column, $type ?? 'asc');
        return $this;
    }
}
