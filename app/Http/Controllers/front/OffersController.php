<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Resources\front\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index(Request $request)
    {
        $order = Order::with(['trips'])->where('id',1)->first();

        return new OrderResource($order);

    }





}
