<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            SettingSeeder::class,
            TagSeeder::class,
            CategorySeeder::class,
            ProjectSeeder::class,
            PostSeeder::class,
            DonorSeeder::class,
                // PageSeeder::class,
            FaqSeeder::class,
            InquirySeeder::class,
            HomeSeeder::class,
        ]);
    }
}
