<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultData;
use App\Repositories\DefaultRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DefaultDataController extends Controller
{
    private  $defaultRepository;
    public function __construct(DefaultRepository $defaultRepository)
    {
        $this->defaultRepository = $defaultRepository;
    }

    public function getData(){
        $defaultData = DefaultData::with('localizations')->first();

            return view('admin.default-data.edit',compact('defaultData'));
    }

    public function dataUpdate(request $request)
    {
         $this->defaultRepository->update($request->all());
        return Redirect::back()->with('success', 'Success');
    }


}
