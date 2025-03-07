<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSeo;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\HomeRepository;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    private HomeRepository $homeRepository;
    public function __construct(HomeRepository $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::with('localizations')->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function edit()
    {
        $homes = HomeSeo::with(['localizations'])->first();
        return view('admin.home-seo.edit',compact('homes'));
    }

    public function homeUpdate(request $request)
    {
        $this->homeRepository->update($request->all());
        return Redirect::back()->with('success', 'Success');
    }
}
