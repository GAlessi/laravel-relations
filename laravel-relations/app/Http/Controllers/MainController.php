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
        $cars = Car::all();

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
             'KW' => 'required|integer|min:10|max:3000',
         ]);

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
            'KW' => 'required|integer|min:10|max:3000',
        ]);

        $car = Car::findOrFail($id);
        $car -> update($validated);
        return redirect() -> route('home');
    }

    // public function destroy($id)
    // {
    //     $car = Car::findOrFail($id);
    //     $car -> delete();
    //     return redirect() -> route('home');
    // }
}
