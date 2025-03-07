<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lawyer;

class LawyerController extends Controller
{
    public function index(){
        $getLawyer = Lawyer::first();
        $images = $getLawyer->getMedia('lawyer');
        $lawyer = Lawyer::with('localizations')->get();
        return view('lawyer',compact('getLawyer','images','lawyer'));
    }
}
