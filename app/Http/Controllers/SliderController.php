<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return view('Dashboard.Pages.Slider.Index', [
            'title' => 'Gambar Slider',
        ]);
    }
}
