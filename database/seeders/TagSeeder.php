<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Technology',
            'Education',
            'Health',
            'Innovation',
            'Sustainability',
            'Culture',
            'Community',
            'Agriculture',
            'Finance',
            'Art',
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag),
                'is_active' => true,
            ]);
        }
    }
}
