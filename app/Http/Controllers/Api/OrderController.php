<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'city_type' => 'required'
        ]);

        $cityType = $request->city_type;

        $orders = Order::when($cityType !== 'all', function ($query) use ($cityType) {
            $query->where('city_type', $cityType);
        })->where('status', 'new')->get();

        return new \App\Http\Resources\OrderCollection($orders);
    }

    public function create(Request $request)
    {
        $request->validate([
            'price' => 'required|integer',
            'time' => 'required',
            'from_street' => 'required',
            'from_house' => 'required',
            'from_entrance' => 'nullable',
            'to_street' => 'required',
            'to_house' => 'required',
            'to_entrance' => 'nullable',
            'comment' => 'required',
            'city_type' => 'required',
        ]);

        $order = Order::create([
            'price' => $request->get('price'),
            'time' => $request->get('time'),
            'from_street' => $request->get('from_street'),
            'from_house' => $request->get('from_house'),
            'from_entrance' => $request->get('from_entrance'),
            'to_street' => $request->get('to_street'),
            'to_house' => $request->get('to_house'),
            'to_entrance' => $request->get('to_entrance'),
            'comment' => $request->get('comment'),
            'city_type' => $request->get('city_type'),
            'status' => 'new',
        ]);

        return new \App\Http\Resources\Order($order);
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'driver_id' => 'required',
            'order_id' => 'required',
        ]);

        $order = Order::findOrFail($request->get('order_id'));

        if ($order->status !== 'new') {
            return response()->json([
                'data' => ['message' => 'Заказ уже ринят'],
                'error_code' => 1
            ]);
        }

        $order->driver_id = $request->get('driver_id');
        $order->status = 'confirmed';
        $order->save();
        return \App\Http\Resources\OrderConfimed::make($order);
    }

    public function userOrder($id)
    {
        $order = Order::findOrFail($id);

        return \App\Http\Resources\Order::make($order);
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        if ($order->status === 'confirmed') {
            return response()->json([
                'data' => ['message' => 'Заказ уже принят'],
                'error_code' => 1
            ]);
        }
        $order->status = 'canceled';
        $order->save();
    }
}
