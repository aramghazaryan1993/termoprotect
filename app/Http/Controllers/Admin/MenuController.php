<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Models\Menu;
use App\Models\Product;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('localizations')->whereNull('parent_id')->get();

        $subMenus = Menu::with('children')->whereNull('parent_id')->get();
        return view('admin.menu.index',compact('menus','subMenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
        if(!empty($request->menu_id))
        {
            $menuId = $request->menu_id;
            return view('admin.menu.create-submenu',compact('menuId'));
        }else{
            return view('admin.menu.create');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {

        $this->menuRepository->create($request->all());
        if(empty($request->menu_id))
        {
            return redirect()->route('admin.menus.index');
        }else{
            return redirect("adminka/menus/{$request->menu_id}");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subMenus = Menu::with('localizations')->where('parent_id',$id)->get();

        $menu= Menu::with('localizations')->where('id',$id)->first();
        $menuName = $menu->localizations[2]->title;
        $menuId = $id;

       return view('admin.menu.index',compact('subMenus','menuId','menuName'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::where('menus.id', $id)->with(['localizations'])->get();
        return view('admin.menu.edit',['menu' => $menu[0]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuUpdateRequest $request, string $id)
    {

        $this->menuRepository->update($request->all());
        if(empty($request->parent_id))
        {
            return redirect()->route('admin.menus.index');
        }else{
            return redirect("adminka/menus/{$request->parent_id}");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->menuRepository->destroy($id);
        return redirect()->route('admin.menus.index');
    }
}
