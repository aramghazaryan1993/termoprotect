<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Lawyer;
use App\Models\Menu;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
        $subMenuId = $request->submenu_id;
      return view('admin.product.create',compact('subMenuId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $this->productRepository->create($request->all());
        return redirect("adminka/products/{$request->subMenuId}");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::with('localizations')->where('menu_id',$id)->get();
        $subMenu = Menu::with('localizations')->where('id',$id)->first();
        $subMenuTranslation = $subMenu->localizations->where('lang', 'hy')->first();
        $subMenuId = $id;
        return view('admin.product.index',compact('products','subMenuId','subMenuTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('products.id', $id)->with(['localizations'])->get();
        return view('admin.product.edit',['product' => $product[0]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $this->productRepository->update($request->all());
        return redirect("adminka/products/{$request->submenu_id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $this->productRepository->destroy($id);
        return redirect("adminka/products/{$request->submenu_id}");
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
        Product::whereNotNull('main_image_id')->update(['main_image_id' => null]);
        Product::where('id', $request->image_id)->update(['main_image_id' => $request->image_id]);

        return response()->json(['success' => true]);
    }
}
