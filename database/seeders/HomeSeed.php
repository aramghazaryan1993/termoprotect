<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed data for homes
        $homes = [
            ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            // Add other homes similarly
        ];

        // Insert data into homes table
        $homeIds = [];
        foreach ($homes as $home) {
            $homeIds[] = DB::table('home_seo')->insertGetId($home);
        }

        // Seed data for homes_translate
        $translations = [
            // Home 1 translations
            [
                'seo_title' => 'Գարեգունի մոտ',
                'seo_description' => 'Գարեգունի մոտ տեղադրված տների նկարագրություն',
                'seo_keyword' => 'Տներ, բնապահպանական, առաջատար',
                'lang' => 'hy',
                'home_seo_id' => $homeIds[0],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'seo_title' => 'Near Garni',
                'seo_description' => 'Description of houses located near Garni',
                'seo_keyword' => 'Houses, conservation, historical',
                'lang' => 'en',
                'home_seo_id' => $homeIds[0],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'seo_title' => 'У Гарни',
                'seo_description' => 'Описание домов, расположенных недалеко от Гарни',
                'seo_keyword' => 'Дома, сохранение, исторический',
                'lang' => 'ru',
                'home_seo_id' => $homeIds[0],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'seo_title' => 'У Гарни',
                'seo_description' => 'Описание домов, расположенных недалеко от Гарни',
                'seo_keyword' => 'Дома, сохранение, исторический',
                'lang' => 'es',
                'home_seo_id' => $homeIds[0],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add translations for other homes similarly
        ];

        // Insert data into homes_translate table
        DB::table('home_seo_translate')->insert($translations);
    }
}
