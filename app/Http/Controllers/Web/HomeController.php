<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Location;
use App\Price;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locations = Location::all();
        $prices = Price::all();

        return view('admin.home', compact('locations', 'prices'));
    }

    public function updateLocation(Request $request, $id)
    {
        $request->validate([
            'commission' => 'required|integer'
        ]);
        Location::findOrFail($id)->update([
            'commission' => $request->get('commission')
        ]);

        return redirect()->route('home');
    }


    public function updatePrice(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|integer'
        ]);
        Price::findOrFail($id)->update([
            'price' => $request->get('price')
        ]);

        return redirect()->route('home');
    }

    public function editPrice($id)
    {
        $price = Price::findOrFail($id);

        return view('admin.price.edit', compact('price'));
    }
}
