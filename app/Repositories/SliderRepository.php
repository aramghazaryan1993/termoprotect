<?php

namespace App\Repositories;

use App\Models\Slider;
use Illuminate\Support\Str;

class SliderRepository
{
    public function create(array $data)
    {
        $slider = new Slider();

        if(!empty($data['img']))
        {
            $slider->clearMediaCollection('slider');
              $slider->addMedia($data['img'])
                ->withCustomProperties(['home' => true])
                ->usingFileName(Str::random(10) . '.' . $data['img']->getClientOriginalExtension())
                ->toMediaCollection('slider');

        }
        $slider->save();

        foreach($data['langs'] as $key => $item) {

            $slider->localizations()->create([
                'text_one' => $item['text_one'],
                'text_two' => $item['text_two'],
                'slider_id ' => $slider->slider_id,
                'lang' => $key
            ]);
        }
        return $slider;
    }

    public function update(array $data)
    {
        $slider = Slider::find($data['id']);

        if (!empty($data['img'])) {

            $slider->clearMediaCollection('slider');
               $slider->addMedia($data['img'])
                ->withCustomProperties(['home'=> true])
                ->usingFileName(Str::random(10).'.'.$data['img']->getClientOriginalExtension())
                ->toMediaCollection('slider');
        }

        $slider->save();

        foreach($data['langs'] as $key => $item) {

            $slider->localizations()->where('lang',$key)->update([
                'text_one' => $item['text_one'],
                'text_two' => $item['text_two'],
            ]);
        }
    }

    public function destroy(int $id)
    {
        $deleteSlider = Slider::find($id);
        $deleteSlider->delete();
        return $deleteSlider;
    }
}
