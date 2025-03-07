<?php

namespace Database\Seeders;

use App\Models\Partner;
use App\Models\PartnerTranslate;
use App\Models\Service;
use App\Models\ServiceTranslate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create about data with image link
        $partner = Partner::create(
            ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );

        // Sample translations for each language with large text
        $translations = [
            [
                'title' => 'Wolarms',
                'lang' => 'en',
            ],
            [
                'title' => 'Волармс',
                'lang' => 'ru',
            ],
            [
                'title' => 'Վոլերմներ',
                'lang' => 'hy',
            ],
        ];

        // Create translations for each language
        foreach ($translations as $translation) {
            PartnerTranslate::create([
                'title' => $translation['title'],
                'lang' => $translation['lang'],
                'partner_id' => $partner->id,
            ]);
        }

        // Add media to the model
        if ($partner instanceof HasMedia) {
            $partner->addMedia(public_path('image/partner2.png')) // Ensure a sample image is here
            ->preservingOriginal()
                ->toMediaCollection('partners');
        }
    }

    /**
     * Generate large text for seeding in different languages.
     *
     * @param int $length Length of the text
     * @param string $lang Language of the text
     * @return string Large text
     */
    private function generateLargeText($length = 1000, $lang = 'en')
    {
        $baseText = '';

        switch ($lang) {
            case 'hy':
                $baseText = 'Մեր մասին տեքստ ';
                break;
            case 'ru':
                $baseText = 'Текст о нас ';
                break;
            default:
                $baseText = 'Text about us ';
                break;
        }

        return str_repeat($baseText, $length / 50);


    }
}
