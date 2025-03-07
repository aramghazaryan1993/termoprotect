<?php

namespace Database\Seeders;

use App\Models\Slider;
use App\Models\SliderTranslate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {


        // Create slider data with image link
        $slider = Slider::create(
            ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );

        // Sample translations for each language with large text
        $translations = [
            [
                'text_one' => $this->generateLargeText(1, 'en'),
                'lang' => 'en',
            ],
            [
                'text_one' => $this->generateLargeText(1, 'ru'),
                'lang' => 'ru',
            ],
            [
                'text_one' => $this->generateLargeText(1, 'hy'),
                'lang' => 'hy',
            ],
        ];

        // Create translations for each language
        foreach ($translations as $translation) {
            SliderTranslate::create([
                'text_one' => $translation['text_one'],
                'lang' => $translation['lang'],
                'slider_id' => $slider->id,
            ]);
        }

        // Add media to the model
        if ($slider instanceof HasMedia) {
            $slider->addMedia(public_path('image/banner1.jpg')) // Ensure a sample image is here
            ->preservingOriginal()
                ->toMediaCollection('slider');
        }
    }

    /**
     * Generate large text for seeding in different languages.
     *
     * @param int $length Length of the text
     * @param string $lang Language of the text
     * @return string Large text
     */
    private function generateLargeText($length = 1, $lang = 'en')
    {
        $baseText = '';

        switch ($lang) {
            case 'hy':
                $baseText = 'Որոշ ներկայացուցիչ';
                break;
            case 'ru':
                $baseText = 'Некоторые представители';
                break;
            default:
                $baseText = 'Some placeholder';
                break;
        }

        return str_repeat($baseText, $length / 1);
    }
}
