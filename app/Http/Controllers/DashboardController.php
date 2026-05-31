<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vehicle;
use App\Models\ServiceHistory;

class DashboardController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('serviceHistories')
            ->where(
                'user_id',
                 auth()->id()
            )
            ->latest()
            ->get();

        return view(
            'dashboard',
            compact('vehicles')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'brand' => 'required',

            'type' => 'required',

            'plate_number' => 'required',

            'category' => 'required',

            'odometer' => 'required|numeric',

            'tax_due_date' => 'required|date',
        ]);

       Vehicle::create([

    'user_id' => auth()->id(),

    'brand' => $request->brand,

    'type' => $request->type,

    'plate_number' =>
        $request->plate_number,

    'category' =>
        $request->category,

    'odometer' =>
        $request->odometer,

    'tax_due_date' =>
        $request->tax_due_date,

    'last_service_km' =>
        $request->odometer,

    'service_interval' => 5000,

    'last_service_date' => now(),

    'next_service_date' =>
        now()->addMonths(3),
]);

        return back();
    }

    public function renewTax($id)
{
    $vehicle =
        Vehicle::findOrFail($id);

    if (
        $vehicle->user_id !==
        auth()->id()
    ) {
        abort(403);
    }

    $vehicle->update([

        'tax_due_date' =>

            $vehicle->tax_due_date

            ? \Carbon\Carbon::parse(
                $vehicle->tax_due_date
              )->addYear()

            : now()->addYear()

    ]);

    return back();
}

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        if (
            $vehicle->user_id !==
            auth()->id()
        ) {
            abort(403);
        }

        $vehicle->delete();

        return back();
    }

    public function update(
    Request $request,
    $id
)
{
    $vehicle =
        Vehicle::findOrFail($id);

    if (
        $vehicle->user_id !==
        auth()->id()
    ) {
        abort(403);
    }

    $request->validate([

        'brand' => 'required',

        'type' => 'required',

        'plate_number' => 'required',

        'category' => 'required',

        'tax_due_date' =>
            'nullable|date',

    ]);

    $vehicle->update([

        'brand' =>
            $request->brand,

        'type' =>
            $request->type,

        'plate_number' =>
            $request->plate_number,

        'category' =>
            $request->category,

        'tax_due_date' =>
            $request->tax_due_date,

    ]);

    return back();
}

    public function updateOdometer(
    Request $request,
    $id
)
{
    $request->validate([
        'odometer' =>
            'required|numeric'
    ]);

    $vehicle =
        Vehicle::findOrFail($id);

    if (
        $vehicle->user_id !==
        auth()->id()
    ) {
        abort(403);
    }

    ServiceHistory::create([

    'vehicle_id' =>
        $vehicle->id,

    'odometer' =>
        $request->odometer,

    'service_date' =>
        now(),

]);


    $vehicle->update([

        'odometer' =>
            $request->odometer,

        'last_service_km' =>
            $request->odometer,

        'last_service_date' =>
            now(),

        'next_service_date' =>
            now()->addMonths(3),
    ]);

    return back();
}
}