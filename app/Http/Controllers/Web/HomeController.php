<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Location;
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
        return view('admin.home', compact('locations'));
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
}
