<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;

class ReminderController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::where(
            'user_id',
            auth()->id()
        )->get();

        return view(
            'reminder',
            compact('vehicles')
        );
    }
}