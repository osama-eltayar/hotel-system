<?php

namespace App\Filters;

use Illuminate\Support\Arr;

class HotelFilter extends BaseFilter
{

    protected function applyFilters(array $data)
    {
        $this->filterName(Arr::get($data, 'name'))
             ->filterPriceFrom(Arr::get($data, 'price.from'))
             ->filterPriceTo(Arr::get($data, 'price.to'));

        return $this;
    }

    protected function filterName($name)
    {
        if ($name)
            $this->query->where('name', 'like', "%{$name}%");
        return $this;
    }

    protected function filterPriceFrom($price)
    {
        if ($price)
            $this->query->where('price', '>=', $price);
        return $this;
    }

    protected function filterPriceTo($price)
    {
        if ($price)
            $this->query->where('price', '<=', $price);
        return $this;
    }
}
