<?php

namespace App\Repositories;

use App\Models\HomeSeo;

class HomeRepository
{
    public function update(array $data)
    {
        $updateHome = HomeSeo::find($data['id']);

        foreach($data['langs'] as $key => $item) {

            $updateHome->localizations()->where('lang',$key)->update([
                'seo_title' => $item['seo_title'],
                'seo_description' => $item['seo_description'],
                'seo_keyword' => $item['seo_keyword'],
            ]);
        }
    }
}
