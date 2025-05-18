<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return Inertia::render('Cars/CarList', [
            'cars' => $cars
        ]);
    }

    public function create()
    {
        return Inertia::render('Cars/AddCar');
    }

    public function store(Request $request)
    {
        // dd($request->file('image'));
        try {
            $request->validate([
                'name' => 'required',
                'brand' => 'required',
                'model' => 'required',
                'year' => 'required|integer',
                'car_type' => 'required',
                'daily_rent_price' => 'required|numeric',
                'availability' => 'required',
                'image' => 'nullable|image|max:2048',
            ]);

            $imageLocation = '';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images', $imageName, 'shared');
                $imageLocation = Storage::disk('shared')->url($imagePath);
            }

            Car::create([
                'name' => $request->name,
                'brand' => $request->brand,
                'model' => $request->model,
                'year' =>  $request->year,
                'car_type' =>  $request->car_type,
                'daily_rent_price' =>  $request->daily_rent_price,
                'availability' =>  $request->availability,
                'image' =>  $imageLocation
            ]);




            // Car::create($data);
            return redirect()->route('car.index')->with('success', 'Car created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit(Car $car)
    {
        return Inertia::render('Cars/EditCar', [
            'car' => $car
        ]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'year' => 'required|integer',
                'car_type' => 'required|string|max:255',
                'daily_rent_price' => 'required|numeric',
                'availability' => 'required|boolean',
                'image' => 'nullable|image|max:2048'
            ]);

            $car = Car::findOrFail($id);

            $imageLocation = $car->image;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images', $imageName, 'shared');
                $imageLocation = Storage::disk('shared')->url($imagePath);
            }

            $car->update([
                'name' => $request->name,
                'brand' => $request->brand,
                'model' => $request->model,
                'year' =>  $request->year,
                'car_type' =>  $request->car_type,
                'daily_rent_price' =>  $request->daily_rent_price,
                'availability' =>  $request->availability,
                'image' =>  $imageLocation
            ]);
            return redirect()->route('car.index')->with('success', 'Car updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        if ($car->image) {
            $imagePath = str_replace(Storage::disk('shared')->url(''), '', $car->image);

            if (Storage::disk('shared')->exists($imagePath)) {
                Storage::disk('shared')->delete($imagePath);
            }
        }

        $car->delete();
        return redirect()->route('car.index')->with('success', 'Car deleted successfully.');
    }
}
