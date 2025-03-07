<?php

namespace App\Repositories;

use App\Models\ContactSeo;

class ContactRepository
{
    public function update(array $data)
    {
        $updateContact = ContactSeo::find($data['id']);

        foreach($data['langs'] as $key => $item) {

            $updateContact->localizations()->where('lang',$key)->update([
                'seo_title' => $item['seo_title'],
                'seo_description' => $item['seo_description'],
                'seo_keyword' => $item['seo_keyword'],
                'slug' => $item['slug'],
            ]);
        }
    }
}
