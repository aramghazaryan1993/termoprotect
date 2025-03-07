<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        $getPartnerBaner = Partner::first();
        $partners = Partner::with(['localizations'])->get();
        return view('partners',compact('partners','getPartnerBaner'));
    }
}
