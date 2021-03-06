<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\IntercityOrder;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryOrder = "CASE WHEN status = 'new' THEN 1 ";
        $queryOrder .= "WHEN status = 'confirmed' THEN 2 ";
        $queryOrder .= "ELSE 3 END";

        $orders = Order::orderByDesc('created_at')->paginate();
        return view('admin.orders.index', compact('orders'));
    }

    public function intercityOrders()
    {
        $orders = IntercityOrder::orderByDesc('created_at')->paginate();
        return view('admin.orders.intercity', compact('orders'));
    }

    public function intercityDestroy($id)
    {
        IntercityOrder::findOrFail($id)->delete();

        return redirect()->route('admin.intercity.orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();

        return redirect()->route('admin.orders.index');
    }
}
