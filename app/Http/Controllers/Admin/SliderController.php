<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;
use App\Repositories\SliderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    private  $sliderRepository;
    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function index()
    {
        $sliders = Slider::with('localizations')->get();
            return view('admin.slider.index',compact('sliders'));
    }

    public function create(request $request)
    {
       return view('admin.slider.create');
    }

    public function store(SliderRequest $request)
    {
        $this->sliderRepository->create($request->all());
            return redirect()->route('admin.slider');
    }

    public function edit($id)
    {
        $sliderEdit = Slider::where('id',$id)->with('localizations')->first();
            return view('admin.slider.edit',compact('sliderEdit'));
    }

    public function update(SliderUpdateRequest $request)
    {
        $this->sliderRepository->update($request->all());
            return redirect()->route('admin.slider');
    }

    public function destroy($id)
    {
        $this->sliderRepository->destroy($id);
            return redirect()->route('admin.slider');
    }
}
