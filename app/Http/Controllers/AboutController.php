<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Team;

class AboutController extends Controller
{
    public function index(){
        $getAbout = About::first();
        $images = $getAbout->getMedia('about');
        $teams = Team::with('localizations')->get();
        return view('about',compact('getAbout','images','teams'));
    }
}
