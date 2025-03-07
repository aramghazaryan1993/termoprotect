<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use App\Repositories\AboutRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AboutController extends Controller
{
    private  $aboutRepository;
    public function __construct(AboutRepository $aboutRepository)
    {
        $this->aboutRepository = $aboutRepository;
    }

    public function index()
    {
        $about = About::with('localizations')->first();
        $images = $about->getMedia('about');
        return view('admin.about.edit',compact('about','images'));
    }

    public function aboutUpdate(AboutRequest $request)
    {
        $this->aboutRepository->update($request->all());
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
        About::whereNotNull('main_image_id')->update(['main_image_id' => null]);
        About::where('id', $request->image_id)->update(['main_image_id' => $request->image_id]);

        return response()->json(['success' => true]);
    }

}
