<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::paginate(15);
        return view('deliveries.index', compact('deliveries'));
    }

    public function create()
    {
        return view('deliveries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|max:255',
            'details' => 'nullable|string',
            'cost' => 'required|numeric|min:0',
        ]);

        Delivery::create($data);
        return Redirect::route('deliveries.index')->with('success', 'Delivery option created');
    }

    public function edit(Delivery $delivery)
    {
        return view('deliveries.edit', compact('delivery'));
    }

    public function update(Request $request, Delivery $delivery)
    {
        $data = $request->validate([
            'type' => 'required|string|max:255',
            'details' => 'nullable|string',
            'cost' => 'required|numeric|min:0',
        ]);

        $delivery->update($data);
        return Redirect::route('deliveries.index')->with('success', 'Delivery option updated');
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return Redirect::back()->with('success', 'Delivery option deleted');
    }
}
