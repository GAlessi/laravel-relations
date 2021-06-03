<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Pilot;

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
}
