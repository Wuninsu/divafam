<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Education',
            'Health & Wellness',
            'Women Empowerment',
            'Youth Development',
            'Sanitation & Hygiene',
            'Water & Sanitation',
            'Agriculture & Food Security',
            'Technology & Innovation',
            'Environment & Climate Action',
            'Economic Empowerment',
            'Community Development',
            'Arts & Culture',
            'Human Rights',
            'Disaster Relief',
            'Governance & Civic Engagement',
            'Entrepreneurship',
            'Digital Literacy',
            'Maternal & Child Health',
            'Financial Inclusion',
        ];

        foreach ($categories as $name) {
            Category::updateOrCreate(
                ['name' => $name],
                [
                    'slug' => Str::slug($name),
                    'status' => rand(0, 1),
                ]
            );
        }
    }
}
