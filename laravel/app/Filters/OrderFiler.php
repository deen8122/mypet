<?php

namespace App\Filters;

class OrderFiler extends BaseFilter
{
    public function name(?string $name): void
    {
        $this->builder->where('name', 'like', "%$name%");
    }

    public function priceMin(int $price): void
    {
        $this->builder->where('price', '>=', $price);
    }

    public function priceMax(int $price): void
    {
        $this->builder->where('price', '<=', $price);
    }

    public function bedrooms(int $value): void
    {
        $this->builder->where('bedrooms', $value);
    }

    public function bathrooms(int $value): void
    {
        $this->builder->where('bathrooms', $value);
    }

    public function storeys(int $value): void
    {
        $this->builder->where('storeys', $value);
    }

    public function garages(int $value): void
    {
        $this->builder->where('garages', $value);
    }
}