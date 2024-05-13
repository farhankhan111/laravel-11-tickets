<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Resources\front\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index(Request $request)
    {
        $tickets = Order::WithOriginDestination()->with(['tickets'])->where('id',1)->firstOrFail();

        return new OrderResource($tickets);
    }

}
