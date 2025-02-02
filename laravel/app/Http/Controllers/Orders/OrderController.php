<?php

namespace App\Http\Controllers\Orders;

use App\Filters\OrderFiler;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(OrderFiler $order)
    {
        //For testing loading spinner
        sleep(1);
        return $order->for(Order::class)->paginate();
    }
}
