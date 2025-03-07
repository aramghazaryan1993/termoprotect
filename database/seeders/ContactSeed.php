<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for contacts
        $contacts = [
            ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            // Add other contacts similarly
        ];

        // Insert data into contacts table
        $contactIds = [];
        foreach ($contacts as $contact) {
            $contactIds[] = DB::table('contact_seo')->insertGetId($contact);
        }

        // Seed data for contacts_translate
        $translations = [
            // Contact 1 translations
            [
                'seo_title' => 'Կապ',
                'seo_description' => 'Կապի նկարագրություն',
                'seo_keyword' => 'կապ, կապը',
                'slug' => 'kap',
                'lang' => 'hy',
                'contact_seo_id' => $contactIds[0],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'seo_title' => 'Контакты',
                'seo_description' => 'Описание контакта',
                'seo_keyword' => 'контакт, описание',
                'slug' => 'kontakty',
                'lang' => 'ru',
                'contact_seo_id' => $contactIds[0],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'seo_title' => 'Contact',
                'seo_description' => 'Contact description',
                'seo_keyword' => 'contact, description',
                'slug' => 'contact',
                'lang' => 'en',
                'contact_seo_id' => $contactIds[0],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'seo_title' => 'Contact',
                'seo_description' => 'Contact description',
                'seo_keyword' => 'contact, description',
                'slug' => 'contact',
                'lang' => 'es',
                'contact_seo_id' => $contactIds[0],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add translations for other contacts similarly
        ];

        // Insert data into contacts_translate table
        DB::table('contact_seo_translate')->insert($translations);
    }
}
