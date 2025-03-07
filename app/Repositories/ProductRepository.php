<?php


namespace App\Repositories;


use App\Models\Product;
use Illuminate\Support\Str;

class ProductRepository
{
    public function create(array $data)
    {

        $products = new  Product();
        $products->menu_id = $data['subMenuId'];

        if (!empty($data['img'])) {
            foreach ($data['img'] as $image) {
                $products->addMedia($image)
                    ->withCustomProperties(['home' => true])
                    ->usingFileName(Str::random(10) . '.' . $image->getClientOriginalExtension())
                    ->toMediaCollection('product');
            }
        }

        $products->save();


        foreach ($data['langs'] as $key => $item) {
            $products->localizations()->create([
                'title' => $item['title'],
                'text' => $item['text'],
                'seo_title' => $item['seo_title'],
                'seo_description' => $item['seo_description'],
                'seo_keyword' => $item['seo_keyword'],
                'slug' => $item['slug'] ? $item['slug'] : $item['title'],
                'product_id' => $products->id,
                'lang' => $key
            ]);
        }
    }

    public function update(array $data)
    {
        $updateProduct = Product::find($data['id']);


        if (!empty($data['img'])) {
            foreach ($data['img'] as $image) {
                $updateProduct->addMedia($image)
                    ->withCustomProperties(['home' => true])
                    ->usingFileName(Str::random(10) . '.' . $image->getClientOriginalExtension())
                    ->toMediaCollection('product');
            }
        }

        foreach ($data['langs'] as $key => $item) {
            $updateProduct->localizations()->where('lang', $key)->update([
                'title' => $item['title'],
                'text' => $item['text'],
                'seo_title' => $item['seo_title'],
                'seo_description' => $item['seo_description'],
                'seo_keyword' => $item['seo_keyword'],
                'slug' => $item['slug'],
            ]);
        }
    }

    public function destroy(string $id)
    {
        $delete = Product::find($id);
        $delete->delete();
        return $delete;
    }
}
