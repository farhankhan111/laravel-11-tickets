<?php

namespace App\Http\Controllers;

use App\Http\Resources\backend\OrderResource;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();

        return OrderResource::collection($orders);

    }

    public function show(Order $order)
    {

        $order->load(['contact','trips.flights.legs']);
        $data = $order;

        return new OrderResource($data);

    }



}
