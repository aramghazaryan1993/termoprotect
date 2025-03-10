<?php


namespace App\Repositories;


use App\Models\Partner;
use Illuminate\Support\Str;

class PartnersRepository
{
    public function create(array $data)
    {
        $partners = new Partner();

        if(!empty($data['img']))
        {
            $partners->clearMediaCollection('partners');
                $partners->addMedia($data['img'])
                ->withCustomProperties(['home' => true])
                ->usingFileName(Str::random(10) . '.' . $data['img']->getClientOriginalExtension())
                ->toMediaCollection('partners');
        }
        $partners->save();

        foreach($data['langs'] as $key => $item) {

            $partners->localizations()->create([
                'title' => $item['title'],
                'partner_id ' => $partners->partner_id,
                'lang' => $key
            ]);

        }
        return $partners;
    }

    public function update(array $data)
    {
        $partner = Partner::find($data['id']);

        if (!empty($data['img_baner'])) {

            $partner->clearMediaCollection('partners_banner');
            // Ավելացնում ենք նոր `img_baner` նկարը
            $partner->addMedia($data['img_baner'])
               // ->clearMediaCollection('partners_banner')
                ->withCustomProperties(['banner' => true])
                ->usingFileName(Str::random(10).'.'.$data['img_baner']->getClientOriginalExtension())
                ->toMediaCollection('partners_banner');
        }

        if (!empty($data['img'])) {

            $partner->clearMediaCollection('partners');

                $partner->addMedia($data['img'])
                ->withCustomProperties(['home'=> true])
                ->usingFileName(Str::random(10).'.'.$data['img']->getClientOriginalExtension())
                ->toMediaCollection('partners');
        }

        $partner->save();

        foreach($data['langs'] as $key => $item) {

            $partner->localizations()->where('lang',$key)->update([
                'title' => $item['title']
            ]);
        }
    }

    public function destroy(string $id)
    {
        $deletPartner = Partner::find($id);
        $deletPartner->delete();
        return $deletPartner;
    }
}
