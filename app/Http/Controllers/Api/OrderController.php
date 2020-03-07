<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    /**
     * @bodyParam city_type string required The usharal or intercity.
     */

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

    /**
     * @bodyParam price int required
     * @bodyParam time string required
     * @bodyParam from_street string required
     * @bodyParam from_house string required
     * @bodyParam from_entrance string required
     * @bodyParam to_street string required
     * @bodyParam to_house string required
     * @bodyParam to_entrance string required
     * @bodyParam comment string required
     * @bodyParam city_type string required. usharal or intercity
     *
     */
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

    /**
     * @bodyParam driver_id int required
     * @bodyParam order_id int required
     */

    public function confirm(Request $request)
    {
        $request->validate([
            'driver_id' => 'required',
            'order_id' => 'required',
        ]);

        $order = Order::find($request->get('order_id'));

        if (!$order || $order->status !== 'new') {
            return response()->json([
                'data' => ['message' => 'Заказ уже принят'],
                'error_code' => 1
            ]);
        }

        $order->driver_id = $request->get('driver_id');
        $order->status = 'confirmed';
        $order->save();
        return \App\Http\Resources\OrderConfimed::make($order);
    }

    /**
     * @queryParam id int required. Order id
     */

    public function userOrder($id)
    {
        $order = Order::findOrFail($id);

        return \App\Http\Resources\Order::make($order);
    }

    /**
     * @queryParam id int required. Order id
     */
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
