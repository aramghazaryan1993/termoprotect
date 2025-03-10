<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Lawyer;
use App\Models\LawyerTranslate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;

class LawyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           // Create about data with image link
        $lawyer = Lawyer::create(
            ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );

        // Sample translations for each language with large text
        $translations = [
            [
                'title' => 'Lawyer',
                'text' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat quas est exercitationem velit enim labore dicta voluptate sint debitis aut.',
                'seo_title' => 'About Us SEO Title',
                'seo_description' => 'About Us SEO Description',
                'seo_keyword' => 'about, us, information',
                'slug' => 'about-us',
                'lang' => 'en',
            ],
            [
                'title' => 'Lawyer',
                'text' => 'Если заказчик очень умный, он сможет добиться желаемого результата. Пусть он избегает любых упражнений, которые пожелает, ибо труд, называемый удовольствием, положен или',
                'seo_title' => 'О нас SEO Title',
                'seo_description' => 'О нас SEO Description',
                'seo_keyword' => 'о нас, информация',
                'slug' => 'o-nas',
                'lang' => 'ru',
            ],
            [
                'title' => 'Իրավաբան',
                'text' => 'Եթե ​​հաճախորդը շատ խելացի է, ապա նա կկարողանա հասնել ցանկալի արդյունքի: Թող նա խուսափի ցանկացած վարժությունից, որ նա ցանկանում է, քանի որ այն աշխատանքը, որը կոչվում է հաճույք, պետք է կամ',
                'seo_title' => 'Մեր Մասին SEO Վերնագիր',
                'seo_description' => 'Մեր մասին SEO Նկարագրություն',
                'seo_keyword' => 'Մեր, մասին, տեղեկատու',
                'slug' => 'mer-masin',
                'lang' => 'hy',
            ],
            [
                'title' => 'Iravaban',
                'text' => 'Եթե ​​հաճախորդը շատ խելացի է, ապա նա կկարողանա հասնել ցանկալի արդյունքի: Թող նա խուսափի ցանկացած վարժությունից, որ նա ցանկանում է, քանի որ այն աշխատանքը, որը կոչվում է հաճույք, պետք է կամ',
                'seo_title' => 'Մեր Մասին SEO Վերնագիր',
                'seo_description' => 'Մեր մասին SEO Նկարագրություն',
                'seo_keyword' => 'Մեր, մասին, տեղեկատու',
                'slug' => 'mer-masin',
                'lang' => 'es',
            ],
        ];

        // Create translations for each language
        foreach ($translations as $translation) {
            LawyerTranslate::create([
                'title' => $translation['title'],
                'text' => $translation['text'],
                'seo_title' => $translation['seo_title'],
                'seo_description' => $translation['seo_description'],
                'seo_keyword' => $translation['seo_keyword'],
                'slug' => $translation['slug'],
                'lang' => $translation['lang'],
                'lawyer_id' => $lawyer->id,
            ]);
        }

        // Add media to the model
        if ($lawyer instanceof HasMedia) {
            $lawyer->addMedia(public_path('image/service2.jpg')) // Ensure a sample image is here
            ->preservingOriginal()
                ->toMediaCollection('lawyer');
        }
    }
}
