<?php

namespace App\Http\Controllers\Web;

use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::paginate();
        return view('admin.drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.drivers.create');
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
            'login' => 'required|unique:drivers,login',
            'phone' => 'required|unique:drivers,phone',
            'balance' => 'integer',
            'password' => 'required',
        ]);

        Driver::create([
            'login' => $request->get('login'),
            'phone' => $request->get('phone'),
            'balance' => $request->get('balance'),
            'password' => $request->get('password'),
            'car_model' => $request->get('car_model'),
            'car_number' => $request->get('car_number'),
            'car_color' => $request->get('car_color'),
        ]);
        return redirect()->route('admin.drivers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('admin.drivers.edit', compact('driver'));
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
        $request->validate([
            'login' => 'required',
            'phone' => 'required',
            'balance' => 'integer',
            'password' => 'required',
        ]);

        Driver::findOrFail($id)->update([
            'login' => $request->get('login'),
            'phone' => $request->get('phone'),
            'balance' => $request->get('balance'),
            'car_model' => $request->get('car_model'),
            'car_number' => $request->get('car_number'),
            'car_color' => $request->get('car_color'),
        ]);
        return redirect()->route('admin.drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Driver::findOrFail($id)->delete();
        return redirect()->route('admin.drivers.index');
    }
}
