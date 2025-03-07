<?php

namespace App\Repositories;

use App\Models\About;
use Illuminate\Support\Str;

class AboutRepository
{
    public function update(array $data)
    {
        $updateAbout = About::find($data['id']);

        if (!empty($data['img_baner'])) {

            $updateAbout->clearMediaCollection('about_banner');
            // Ավելացնում ենք նոր `img_baner` նկարը
            $updateAbout->addMedia($data['img_baner'])
                ->clearMediaCollection('about_banner')
                ->withCustomProperties(['banner' => true])
                ->usingFileName(Str::random(10).'.'.$data['img_baner']->getClientOriginalExtension())
                ->toMediaCollection('about_banner');
        }

        $updateAbout = About::firstOrCreate([]); // Ստանում ենք կամ ստեղծում About մոդելը

        if (!empty($data['img'])) {
            foreach ($data['img'] as $image) {
                $updateAbout->addMedia($image)
                    ->withCustomProperties(['home' => true])
                    ->usingFileName(Str::random(10) . '.' . $image->getClientOriginalExtension())
                    ->toMediaCollection('about');
            }
        }

        foreach ($data['langs'] as $key => $item) {
            $updateAbout->localizations()->where('lang', $key)->update([
                'title' => $item['title'],
                'text' => $item['text'],
                'seo_title' => $item['seo_title'],
                'seo_description' => $item['seo_description'],
                'seo_keyword' => $item['seo_keyword'],
                'slug' => $item['slug'],
            ]);
        }
    }
}

