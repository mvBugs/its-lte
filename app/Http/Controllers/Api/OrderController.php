<?php

namespace App\Http\Controllers\Api;

use App\Driver;
use App\Http\Controllers\Controller;
use App\Location;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    /**
     * @headParam accept-token string required
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
            'from_house' => 'nullable',
            'from_entrance' => 'nullable',
            'to_street' => 'required',
            'to_house' => 'nullable',
            'to_entrance' => 'nullable',
            'comment' => 'nullable',
            'city_type' => 'required',
            'phone' => 'required|string',
        ]);

        $order = Order::create([
            'price' => $request->get('price'),
            'time' => $request->get('time'),
            'from_street' => $request->get('from_street'),
            'from_house' => $request->get('from_house', ''),
            'from_entrance' => $request->get('from_entrance', ''),
            'to_street' => $request->get('to_street'),
            'to_house' => $request->get('to_house', ''),
            'to_entrance' => $request->get('to_entrance', ''),
            'comment' => $request->get('comment', ''),
            'city_type' => $request->get('city_type'),
            'phone' => $request->get('phone'),
            'status' => 'new',
        ]);

        return new \App\Http\Resources\Order($order);
    }

    /**
     * @headParam accept-token string required
     * @bodyParam order_id int required
     */

    public function confirm(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
        ]);

        $token = $request->header('accept-token');

        $driver = Driver::where('api_token', $token)->first();

        $order = Order::find($request->get('order_id'));

        if (!$order || $order->status !== 'new') {
            return response()->json([
                'data' => ['message' => 'Заказ уже принят'],
                'error_code' => 1
            ]);
        }

        $location = Location::where('slug', $order->city_type)->first();
        $commission = $location->commission ?? 1;
        $commisionAmount = $order->price * $commission / 100;

        $driverBalance = $driver->balance;
        if ($driverBalance < $commisionAmount) {
            return response()->json([
                'data' => ['message' => 'Недостаочно средств'],
                'error_code' => 4
            ]);
        }

        $driver->balance = $driverBalance - $commisionAmount;
        $driver->save();

        $order->driver_id = $driver->id;
        $order->status = 'confirmed';
        $order->save();
        return \App\Http\Resources\OrderConfimed::make($order);
    }

    /**
     * @urlParam id int required. Order id
     */

    public function userOrder($id)
    {
        $order = Order::findOrFail($id);

        return \App\Http\Resources\Order::make($order);
    }

    /**
     * @urlParam id int required. Order id
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
