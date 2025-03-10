<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Other seeders...
        $this->call(AboutSeeder::class);
        $this->call(ContactSeed::class);
        $this->call(DefaultDataSeeder::class);
        $this->call(HomeSeed::class);
        $this->call(PartnerSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LawyerSeeder::class);
    }
}
