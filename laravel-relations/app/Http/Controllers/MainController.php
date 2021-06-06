<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Pilot;
use App\Brand;

class MainController extends Controller
{
    public function home()
    {
        // $cars = Car::all();
        $cars = Car::where('deleted', false) -> get();


        return view('pages.home', compact('cars'));
    }

    public function showPilot($id)
    {
        $pilot = Pilot::findOrFail($id);
        return view('pages.showPilot', compact('pilot'));
    }

    public function createCar()
    {
        $brands = Brand::all();
        $pilots = Pilot::all();

        return view('pages.createCar', compact('brands', 'pilots'));
    }

    public function storeCar(Request $request) {
       	 // dd($request -> all());

         $validated = $request -> validate([
            'name' => 'required|string|min:3',
            'model' => 'required|string|min:3',
            'KW' => 'required|integer|min:100|max:3000',
            'brand_id' => 'required|exists:brands,id|integer',
            'pilots_id' => 'required|exists:pilots,id|array',
            'pilots_id.*' => 'integer',

        ]);

         // dd($validated);

         $brand = Brand::findOrFail($request -> get('brand_id'));

         $car = Car::make($validated);
         $car -> brand() -> associate($brand);
         $car -> save();

         $car -> pilots() -> attach($request -> get('pilots_id'));
         $car -> save();

         return redirect() -> route('home');
    }

    public function editCar($id)
    {
        $car = Car::findOrFail($id);
        $brands = Brand::all();
        $pilots = Pilot::all();

        return view('pages.editCar', compact('car','brands','pilots'));
    }

    public function updateCar(Request $request, $id)
    {
        // dd($request -> all());

        $validated = $request -> validate([
            'name' => 'required|string|min:3',
            'model' => 'required|string|min:3',
            'KW' => 'required|integer|min:100|max:3000',
            'brand_id' => 'required|exists:brands,id|integer',
            'pilots_id' => 'required|exists:pilots,id|array',
            'pilots_id.*' => 'integer',

        ]);

        $car = Car::findOrFail($id);
        $car -> update($validated);

        $brand = Brand::findOrFail($request -> brand_id);
        $car -> brand() -> associate($brand);
        $car -> save();
        // dd($car);

        $car -> pilots() -> sync($request -> pilots_id);
        $car -> save();
        // dd($car);

        return redirect() -> route('home');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car -> deleted = true;
        $car -> save();

        return redirect() -> route('home');
    }
}
