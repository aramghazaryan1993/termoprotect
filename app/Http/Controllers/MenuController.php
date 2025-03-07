<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public  function getMenus($lang,$parentId)
    {
        $subMenus = Menu::where('parent_id',$parentId)->with('localization')->get();
        $menu = Menu::where('id',$parentId)->with('localization')->first();
         return view('menus',compact('subMenus','menu'));
    }
}
