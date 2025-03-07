<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public  function getProducts($lang, $subMenuId)
    {
       $products = Product::where('menu_id',$subMenuId)->with('localization')->get();
       $subMenu = Menu::where('id',$subMenuId)->with('localization')->first();
       $menu = Menu::where('id',$subMenu->parent_id)->with('localization')->first();
       return view('products',compact('products','subMenu','menu'));
    }

    public function getProduct($lang, $productId)
    {
        $product = Product::where('id',$productId)->with('localization')->first();
        $subMenu = Menu::where('id',$product->menu_id)->with('localization')->first();
        $menu = Menu::where('id',$subMenu->parent_id)->with('localization')->first();
        return view('product',compact('product','subMenu','menu'));
    }


}
