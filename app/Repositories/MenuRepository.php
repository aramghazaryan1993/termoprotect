<?php


namespace App\Repositories;


use App\Models\Menu;
use Illuminate\Support\Str;

class MenuRepository
{
    public function create(array $data)
    {
        $menu = new Menu();

        if(!empty(($data['menu_id']))) {
            $menu->parent_id = $data['menu_id'];
        }

        if (!empty($data['img_baner'])) {

            $menu->clearMediaCollection('menu_banner');
            // Ավելացնում ենք նոր `img_baner` նկարը
            $menu->addMedia($data['img_baner'])
                ->withCustomProperties(['home' => true])
                ->usingFileName(Str::random(10).'.'.$data['img_baner']->getClientOriginalExtension())
                ->toMediaCollection('menu_banner');
        }

        if (!empty($data['img'])) {

            $menu->clearMediaCollection('menu');
            // Ավելացնում ենք նոր `img_baner` նկարը
            $menu->addMedia($data['img'])
                ->withCustomProperties(['home' => true])
                ->usingFileName(Str::random(10).'.'.$data['img']->getClientOriginalExtension())
                ->toMediaCollection('menu');
        }

        $menu->save();

            foreach($data['langs'] as $key => $item) {

                $menu->localizations()->create([
                    'title' => $item['title'],
                    'menu_id' => $menu->menu_id,
                    'seo_title' => $item['seo_title'],
                    'seo_description' => $item['seo_description'],
                    'seo_keyword' => $item['seo_keyword'],
                    'slug' => $item['slug'] ? $item['slug'] : $item['title'],
                    'lang' => $key
                ]);
            }

        return $menu;
    }

    public function update(array $data)
    {

        $menuUpdate = Menu::find($data['id']);

        if (!empty($data['img_baner'])) {

            $menuUpdate->clearMediaCollection('menu_banner');
            // Ավելացնում ենք նոր `img_baner` նկարը
            $menuUpdate->addMedia($data['img_baner'])
                ->withCustomProperties(['home' => true])
                ->usingFileName(Str::random(10).'.'.$data['img_baner']->getClientOriginalExtension())
                ->toMediaCollection('menu_banner');
        }

        if (!empty($data['img'])) {

            $menuUpdate->clearMediaCollection('menu');
            // Ավելացնում ենք նոր `img_baner` նկարը
            $menuUpdate->addMedia($data['img'])
                ->withCustomProperties(['home' => true])
                ->usingFileName(Str::random(10).'.'.$data['img']->getClientOriginalExtension())
                ->toMediaCollection('menu');
        }

        foreach ($data['langs'] as $key => $item) {
            $menuUpdate->localizations()->where('lang', $key)->update([
                'title' => $item['title'],
                'seo_title' => $item['seo_title'],
                'seo_description' => $item['seo_description'],
                'seo_keyword' => $item['seo_keyword'],
                'slug' => $item['slug'],
            ]);
        }
    }

    public function destroy(string $id)
    {
        $delete = Menu::find($id);
        $delete->delete();
        return $delete;
    }
}
