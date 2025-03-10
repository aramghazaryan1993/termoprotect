<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\LawyerRequest;
use App\Models\Lawyer;
use App\Repositories\LawyerRepository;
use Illuminate\Support\Facades\Redirect;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class LawyerController extends Controller
{
    private  $lawyerRepository;
    public function __construct(LawyerRepository $lawyerRepository)
    {
        $this->lawyerRepository = $lawyerRepository;
    }

    public function index()
    {
        $lawyer = Lawyer::with('localizations')->first();
        if($lawyer && !empty($lawyer->getMedia('lawyer')))
        {
         $images = $lawyer->getMedia('lawyer');
        }else{
        
            $images = array();
        }
       
        return view('admin.lawyer.edit',compact('lawyer','images'));
    }

    public function lawyerUpdate(LawyerRequest $request)
    {
        $this->lawyerRepository->update($request->all());
        return Redirect::back()->with('success', 'Success');
    }

    public function removeImage(Request $request)
    {
        $image = Media::find($request->image_id);
        if ($image) {
            $image->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function setMainImage(Request $request)
    {
        Lawyer::whereNotNull('main_image_id')->update(['main_image_id' => null]);
        Lawyer::where('id', $request->image_id)->update(['main_image_id' => $request->image_id]);

        return response()->json(['success' => true]);
    }

}
