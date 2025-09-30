<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            [
                'type' => 'how_it_works',
                'title' => 'How It Works',
                'description' => '',
                'image_1' => null,
                'image_2' => null,
                'steps' => json_encode([
                    ['title' => 'Sign Up as Sponsor or Donor', 'description' => 'Join our mission by registering as a sponsor, donor, or partner through our platform.'],
                    ['title' => 'Support a Project', 'description' => 'Browse through our ongoing initiatives and choose the one you’d like to support financially or with resources.'],
                    ['title' => 'Beneficiaries Receive Support', 'description' => 'Your contribution directly impacts women, children, and families in need, providing them with skills and opportunities.'],
                    ['title' => 'See the Impact', 'description' => 'Track the success stories, project updates, and the lives changed because of your support.'],
                ]),
                'community_impact' => null,
                'carousel_items' => null,
            ],

            [
                'type' => 'community_impact',
                'title' => 'Community Impact',
                'description' => '',
                'image_1' => null,
                'image_2' => null,
                'community_impact' => json_encode([
                    ['title' => 'Support for All', 'description' => 'We reach out to communities in need, ensuring support and opportunities for everyone.', 'icon' => 'hands-helping'],
                    ['title' => 'Dedicated Partners', 'description' => 'Our sponsors and donors are the backbone of every successful initiative we run.', 'icon' => 'users'],
                    ['title' => 'Sustainable Growth', 'description' => 'We focus on long-term skills, projects, and programs that uplift entire communities.', 'icon' => 'seedling'],
                ]),
                'steps' => null,
                'carousel_items' => null,

            ],

            [
                'type' => 'carousel',
                'title' => 'Carousel',
                'description' => '',
                'image_1' => null,
                'image_2' => null,
                'carousel_items' => json_encode([
                    ['title' => 'Cabbage Farm', 'description' => 'A thriving cabbage farm project supporting local farmers.', 'button_text' => '', 'button_link' => '', 'order' => 1, 'image' => null],
                    ['title' => 'Team Meeting with Partners', 'description' => 'Collaborating with partners to build stronger communities.', 'button_text' => '', 'button_link' => '', 'order' => 2, 'image' => null],
                    ['title' => 'Serving Kids Food', 'description' => 'Providing nutritious meals to children in need.', 'button_text' => '', 'button_link' => '', 'order' => 3, 'image' => null],
                ]),
                'community_impact' => null,
                'steps' => null,

            ],
        ];


        foreach ($seeds as $content) {
            DB::table('home_contents')->updateOrInsert(
                ['type' => $content['type']],
                [
                    'image_1' => $content['image_1'],
                    'image_2' => $content['image_2'],
                    'title' => $content['title'],
                    'description' => $content['description'],
                    'community_impact' => $content['community_impact'],
                    'steps' => $content['steps'],
                    'carousel_items' => $content['carousel_items']
                ]
            );
        }
    }
}
