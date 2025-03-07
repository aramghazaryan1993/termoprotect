<?php


namespace App\Repositories;


use App\Models\Lawyer;
use Illuminate\Support\Str;

class LawyerRepository
{
    public function update(array $data)
    {
        $updateLawyer = Lawyer::find($data['id']);

        if (!empty($data['img_baner'])) {

            $updateLawyer->clearMediaCollection('lawyer_banner');
            // Ավելացնում ենք նոր `img_baner` նկարը
            $updateLawyer->addMedia($data['img_baner'])
               // ->clearMediaCollection('lawyer_banner')
                ->withCustomProperties(['banner' => true])
                ->usingFileName(Str::random(10).'.'.$data['img_baner']->getClientOriginalExtension())
                ->toMediaCollection('lawyer_banner');
        }

        $updateLawyer = Lawyer::firstOrCreate([]); // Ստանում ենք կամ ստեղծում About մոդելը

        if (!empty($data['img'])) {
            foreach ($data['img'] as $image) {
                $updateLawyer->addMedia($image)
                    ->withCustomProperties(['home' => true])
                    ->usingFileName(Str::random(10) . '.' . $image->getClientOriginalExtension())
                    ->toMediaCollection('lawyer');
            }
        }

        foreach ($data['langs'] as $key => $item) {
            $updateLawyer->localizations()->where('lang', $key)->update([
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
