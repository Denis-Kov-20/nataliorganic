<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $sliders = Slider::all();
        return view('page.home', compact('sliders'));
    }
}
