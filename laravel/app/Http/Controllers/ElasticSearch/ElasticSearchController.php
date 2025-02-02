<?php

namespace App\Http\Controllers\ElasticSearch;

use App\Filters\OrderFiler;
use App\Http\Controllers\Controller;
use App\Models\Order;

class ElasticSearchController extends Controller
{
    public function index(OrderFiler $order)
    {
        //For testing loading spinner

    }
}
