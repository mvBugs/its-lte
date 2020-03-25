<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Resources\IntercityDriverOrder;
use App\Http\Resources\IntercityOrderCollection;
use App\IntercityOrder;
use App\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IntercityOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $orders = IntercityOrder::where('user_type', $type)->get();

        return new IntercityOrderCollection($orders);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = IntercityOrder::findOrFail($id);

        return IntercityDriverOrder::make($order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_id_to' => 'required|string',
            'city_id_from' => 'required|string',
            'time' => 'required|string',
            'date' => 'required|string',
            'price' => 'required|integer',
            'phone' => 'required|string',
            'user_type' => 'required|string',
            'comment' => '',
        ]);

        $date = Carbon::parse($request->get('date').' '.$request->get('time'))->format('Y-m-d H:i:s');

        $data = [
            'city_id_to' => $request->get('city_id_to'),
            'city_id_from' => $request->get('city_id_from'),
            'date' => $date,
            'price' => $request->get('price'),
            'phone' => $request->get('phone'),
            'comment' => $request->get('comment', ''),
            'status' => 'new',
            'user_type' => 'client',
        ];
        $userType = $request->get('user_type');
        $driver = auth_driver();
        if ($driver && $userType == 'driver') {
            $data['driver_id'] = $driver->id;
            $data['user_type'] = 'driver';

            $cityTo = $request->get('city_id_to');
            $cityFrom = $request->get('city_id_from');

            $price = Price::where(function ($query) use ($cityTo, $cityFrom) {
                    $query->where('city_id_to', $cityTo)
                        ->where('city_id_from', $cityFrom);
                })->orWhere(function ($query) use ($cityTo, $cityFrom) {
                    $query->where('city_id_to', $cityFrom)
                        ->where('city_id_from', $cityTo);
                })->first();
            if ($driver->balance < $price->price) {
                return response()->json([
                    'data' => ['message' => 'Недостаочно средств'],
                    'error_code' => 4
                ]);
            }
            $driver->balance = $driver->balance - $price->price;
            $driver->save();
        }

        $intercityOrder = IntercityOrder::create($data);

        if ($intercityOrder->user_type === 'driver') {
            return new IntercityDriverOrder($intercityOrder);
        }

        return new \App\Http\Resources\IntercityOrder($intercityOrder);
    }

    //type = user or driver
    public function getOrders($type)
    {
        $orders = IntercityOrder::where('user_type', $type)
            ->where('status', 'new')
            ->where('date', '>', Carbon::now())
            ->orderByDesc('created_at')
            ->get();

        if ($type === 'driver') {
            return IntercityDriverOrder::collection($orders);
        }

        return new IntercityOrderCollection($orders);
    }


    /**
     * @urlParam id int required. Order id
     */
    public function cancel($id)
    {
        $order = IntercityOrder::findOrFail($id);
        $order->status = 'canceled';
        $order->save();
    }

    public function getCities()
    {
        $cities = City::all();
        return \App\Http\Resources\City::collection($cities);
    }
}
