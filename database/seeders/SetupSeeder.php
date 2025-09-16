<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setups = [
            // Images
            ['key' => 'logo', 'value' => null, 'type' => 'file', 'status' => true],
            ['key' => 'favicon', 'value' => null, 'type' => 'file', 'status' => true],
            ['key' => 'about_image', 'value' => null, 'type' => 'file', 'status' => true],
            ['key' => 'other_image', 'value' => null, 'type' => 'file', 'status' => true],
            ['key' => 'main_background_image', 'value' => null, 'type' => 'file', 'status' => true],
            ['key' => 'footer_background_image', 'value' => null, 'type' => 'file', 'status' => true],

            // Business Info
            ['key' => 'business_name', 'value' => 'DivaFam', 'type' => 'text', 'status' => true],
            ['key' => 'url', 'value' => 'https://www.divafam.org', 'type' => 'text', 'status' => true],
            ['key' => 'email', 'value' => 'info@divafam.org', 'type' => 'text', 'status' => true],
            ['key' => 'address', 'value' => 'DivaFam Headquarters, Address Location, City, Country', 'type' => 'textarea', 'status' => true],
            ['key' => 'support_email', 'value' => 'support@divafam.org', 'type' => 'text', 'status' => true],
            ['key' => 'support_phone', 'value' => '+1234567890', 'type' => 'text', 'status' => true],
            ['key' => 'motto', 'value' => 'Empowering Women, Strengthening Communities.', 'type' => 'text', 'status' => true],

            // Social Links
            ['key' => 'facebook_link', 'value' => 'https://facebook.com/divafam', 'type' => 'text', 'status' => true],
            ['key' => 'x_link', 'value' => 'https://x.com/divafam', 'type' => 'text', 'status' => true],
            ['key' => 'instagram_link', 'value' => 'https://instagram.com/divafam', 'type' => 'text', 'status' => true],
            ['key' => 'youtube_link', 'value' => 'https://youtube.com/@divafam', 'type' => 'text', 'status' => true],

            // System Configs
            ['key' => 'timezone', 'value' => 'Africa/Accra', 'type' => 'text', 'status' => true],
            ['key' => 'date_format', 'value' => 'Y-m-d', 'type' => 'text', 'status' => true],
            ['key' => 'time_format', 'value' => 'H:i:s', 'type' => 'text', 'status' => true],
            ['key' => 'default_language', 'value' => 'en', 'type' => 'text', 'status' => true],

            // Footer
            ['key' => 'footer_text', 'value' => 'DivaFam is dedicated to empowering women and supporting communities through education, sustainable farming, and development initiatives.', 'type' => 'textarea', 'status' => true],
            ['key' => 'copy_right_text', 'value' => '© 2025 DivaFam. All rights reserved.', 'type' => 'text', 'status' => true],

            // Technical Settings
            ['key' => 'maintenance_mode', 'value' => 'false', 'type' => 'text', 'status' => true],
            ['key' => 'contact_form_email', 'value' => 'support@divafam.org', 'type' => 'text', 'status' => true],
            ['key' => 'sms_api_key', 'value' => 'xxxxxxxxxxxxxxxxxxxx', 'type' => 'text', 'status' => false],
            ['key' => 'google_analytics_id', 'value' => 'UA-XXXXXXXXX-X', 'type' => 'text', 'status' => false],
            ['key' => 'facebook_pixel_id', 'value' => 'XXXXXXXXXXXXXX', 'type' => 'text', 'status' => false],
            ['key' => 'pagination_limit', 'value' => '10', 'type' => 'text', 'status' => true],
            ['key' => 'max_upload_size', 'value' => '2048', 'type' => 'text', 'status' => true],
            ['key' => 'enable_registration', 'value' => 'true', 'type' => 'text', 'status' => true],
            ['key' => 'recaptcha_site_key', 'value' => 'xxxxxxxxxxxxxxxxxxxx', 'type' => 'text', 'status' => false],
            ['key' => 'recaptcha_secret_key', 'value' => 'xxxxxxxxxxxxxxxxxxxx', 'type' => 'text', 'status' => false],

            // SEO
            ['key' => 'site_description', 'value' => 'DivaFam empowers women and youth through sustainable farming, education, and community-building programs. Join us to make a difference.', 'type' => 'textarea', 'status' => true],
            ['key' => 'keywords', 'value' => 'DivaFam, women empowerment, sustainable farming, youth development, community programs, nonprofit, women in agriculture, female empowerment, education', 'type' => 'textarea', 'status' => true],

            // Company Info
            ['key' => 'about_us', 'value' => 'DivaFam (formerly known as Diva Farms) is a nonprofit organization focused on empowering women and youth by providing sustainable farming education and community support.', 'type' => 'textarea', 'status' => true],
            ['key' => 'about_us_sub', 'value' => 'We bridge the gap for women and youth through education, empowerment, and sustainable livelihoods.', 'type' => 'textarea', 'status' => true],
            ['key' => 'mission_statement', 'value' => 'To create a world where women and young people are empowered to build sustainable futures through education, farming, and community support.', 'type' => 'textarea', 'status' => true],
            ['key' => 'vision_statement', 'value' => 'To be a global leader in empowering women and communities through sustainable agriculture and education.', 'type' => 'textarea', 'status' => true],
            ['key' => 'why_choose_us', 'value' => 'At DivaFam, we create lasting impact by empowering women and youth with the skills and knowledge they need to thrive in their communities.', 'type' => 'textarea', 'status' => true],
            [
                'key' => 'why_choose_us_points',
                'value' => json_encode([
                    ['title' => 'Sustainable Farming Skills', 'description' => 'We teach women and youth how to grow their own food and create self-sustaining livelihoods.'],
                    ['title' => 'Empowerment Through Education', 'description' => 'We provide the tools and knowledge to empower individuals and communities to thrive.'],
                    ['title' => 'Climate Awareness', 'description' => 'We promote climate-resilient farming and environmental stewardship for future generations.'],
                    ['title' => 'Stronger Communities', 'description' => 'By empowering individuals, we foster stronger, more resilient communities across the globe.'],
                ]),
                'type' => 'textarea',
                'status' => true
            ],
        ];


        foreach ($setups as $setting) {
            DB::table('setups')->updateOrInsert(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'type' => $setting['type'], 'status' => $setting['status']]
            );
        }
    }
}
