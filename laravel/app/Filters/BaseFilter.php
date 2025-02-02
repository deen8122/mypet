<?php

namespace App\Filters;

use App\Models\Order;
use Illuminate\Http\Request;

class BaseFilter
{
    protected $builder;

    public function __construct(private Request $request)
    {

    }

    public function for(string $model)
    {
        $this->builder = $model::query();

        foreach ($this->request->all() as $field => $value) {
            $method = camel_case($field);
            if (method_exists($this, $method) && $value) {
                call_user_func_array([$this, $method], (array)$value);
            }
        }
        return $this->builder;
    }
}