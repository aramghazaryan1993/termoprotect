<?php

namespace Database\Seeders;

use App\Models\DefaultData;
use App\Models\DefaultDataTranslate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        // Create default data with image link
        $defaultData = DefaultData::create([
            'phone_1' => '(+374 10) 56 01 19',
            'phone_2' => '(+374 12) 56 01 19',
            'phone_3' => '(+374 91) 56 01 19',
            'phone_4' => '(+374 95) 56 01 19',
            'phone_5' => '(+374 95) 56 01 19',
            'email' => 'info@AmiryanVet.am',
            'websayt' => 'https://AmiryanVet.am',
            'facebook' => 'https://facebook.com/example',
            'instagram' => 'https://instagram.com/example',
            'viber' => '95560119',
            'whatsapp' => '95560119',
            'telegram' => 'https://t.me/web_developer25',
            'map' => "https://maps.app.goo.gl/vX9CHXpKKtaxocUL7",
            'map_contact' => "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d381.0370097341278!2d44.5090624!3d40.1802239!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abd4f99afb32b%3A0xa68d9f67f5f62b95!2sAmiryanVet!5e0!3m2!1sen!2sam!4v1728049116441!5m2!1sen!2sam",
        ]);

        // Sample translations for each language with large text
        $translations = [
            [
                'address' => 'Armenia. 0010. Yerevan. Amiryan Str., 10',
                'working' => 'Monday - Sunday 09:00-20:00',
                'lang' => 'en',
            ],
            [
                'address' => 'Армения. 0010. Ереван. Ул. Амиряна, 10',
                'working' => 'Понедельник-воскресенье 09:00-20:00',
                'lang' => 'ru',
            ],
            [
                'address' => 'Հայաստան. 0010. Երեւան. Ամիրյան փող., 10',
                'working' => 'Երկուշաբթի - ուրբաթ 09:00-20:00',
                'lang' => 'hy',
            ],
            [
                'address' => 'Հայաստան. 0010. Երեւան. Ամիրյան փող., 10',
                'working' => 'Երկուշաբթի - Կիրակի 09:00-20:00',
                'lang' => 'es',
            ],
        ];

        // Create translations for each language
        foreach ($translations as $translation) {
            DefaultDataTranslate::create([
                'address' => $translation['address'],
                'working' => $translation['working'],
                'lang' => $translation['lang'],
                'default_data_id' => $defaultData->id,
            ]);
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
            case 'am':
                $baseText = 'Այս է մեր մասին՝ Տեքստ արեք՝ Հայերեն ';
                break;
            case 'ru':
                $baseText = 'Это о нас, Текст на русском ';
                break;
            default:
                $baseText = 'This is about us, Text in English ';
                break;
        }

        return str_repeat($baseText, $length);
    }
}
