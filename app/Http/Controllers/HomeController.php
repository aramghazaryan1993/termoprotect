<?php

namespace App\Http\Controllers;

use App\Models\HomeSeo;
use App\Models\Service;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index($land){
        $homes = HomeSeo::with(['localizations'])->first();
            return view('home',compact('homes'));
    }

}
