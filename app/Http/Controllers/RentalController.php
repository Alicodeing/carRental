<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::with('user', 'car')->latest()->get();

        return Inertia::render('Rentals/Index', [
            'rentals' => $rentals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Rentals/Create', [
            'users' => User::select('id', 'name')->get(),
            'cars' => Car::select('id', 'name', 'brand')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'user_id' => 'required|exists:users,id',
        'car_id' => 'required|exists:cars,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'total_cost' => 'required|numeric|min:0'
        ]);

        Rental::create($data);

        return redirect()->route('rentals.index')->with('success', 'Rental created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        return Inertia::render('Rentals/Edit', [
            'rental' => $rental,
            'user_id' => User::select('id', 'name')->get(),
            'car_id' => Car::select('id', 'name', 'brand')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {       
        $data = $request->validate([
        'user_id' => 'required|exists:users,id',
        'car_id' => 'required|exists:cars,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'total_cost' => 'required|numeric|min:0'
        ]);

        $rental->update($data);

        return redirect()->route('rental/edit')->with('success', 'Rental updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        $rental->delete();

        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
