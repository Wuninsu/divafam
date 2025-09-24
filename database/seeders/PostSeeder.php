<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $tags = Tag::all();
        $user = User::first();

        if ($categories->isEmpty() || $tags->isEmpty() || !$user) {
            $this->command->warn('Make sure categories, tags, and at least one user exist.');
            return;
        }

        $posts = [
            [
                'title' => 'Empowering Women Farmers in Northern Nigeria',
                'slug' => 'empowering-women-farmers-in-northern-nigeria-' . Str::random(5),
                'summary' => 'Discover how Divafam is helping women farmers in Northern Nigeria boost productivity with climate-smart farming.',
                'content' => 'In many parts of Sub-Saharan Africa, women form the backbone of the agricultural sector but often lack access to the resources they need to thrive. At Divafam, we believe that empowering rural women farmers is key to driving both household stability and long-term community development.
                Through our Sustainable Agriculture Initiative, Divafam has trained over 500 women in climate-smart farming techniques, organic composting, and water-efficient irrigation systems. These practices not only increase productivity but also promote resilience against the growing challenges of climate change.
                One such story is that of Mama Amina, a widow and mother of four from Northern Nigeria. After attending our workshop, she transformed her half-acre land into a thriving vegetable farm. Today, she supplies produce to local markets and even mentors younger women in her community.
                Our impact doesn’t stop at farming. Divafam connects women to microfinance opportunities, seed grants, and cooperative networks to ensure that their success is sustainable. The ripple effect of empowering one woman is visible across households, schools, and entire villages.
                By investing in women, we invest in the future. Join us as we build a more equitable, food-secure Africa — one empowered woman at a time.',
                'status' => 'published',
                'published_at' => now(),
                'is_approved' => true,
                'is_active' => true,
                'is_featured' => true,
                'cover_image' => null,
                'views' => rand(50, 500),
                'category_id' => rand(1, 5),
                'author_id' => $user->id,
                'tags' => $tags->whereIn('name', ['Women Empowerment', 'Sustainable Farming'])->pluck('id')->toArray(),
            ],
            [
                'title' => 'Sustainable Agriculture: Protecting Our Climate',
                'slug' => 'sustainable-agriculture-protecting-our-climate-' . Str::random(5),
                'summary' => 'Divafam promotes climate-aware farming practices to ensure a greener future for rural communities.',
                'content' => 'Climate change presents a growing threat to rural farmers across Africa, particularly women who rely heavily on agriculture for their livelihoods. Divafam’s Sustainable Agriculture Initiative aims to equip these farmers with tools and knowledge to adapt and mitigate environmental risks. Our trainings focus on climate-smart techniques such as organic composting, crop diversification, and water-efficient irrigation systems. By reducing reliance on chemical fertilizers and enhancing soil health, farmers can improve yields while preserving the environment. A highlight of our program is the introduction of drought-resistant seeds that allow farmers to maintain productivity even during dry spells. We also work closely with local cooperatives to promote shared knowledge and resources among farmers. Ultimately, Divafam’s commitment to sustainable agriculture helps communities build resilience against climate uncertainties while securing their food sources. Together, we can cultivate a healthier planet and a prosperous future for generations to come.',
                'status' => 'published',
                'published_at' => now(),
                'is_approved' => true,
                'is_active' => true,
                'is_featured' => false,
                'cover_image' => null,
                'views' => rand(50, 500),
                'category_id' => rand(1, 5),
                'author_id' => $user->id,
                'tags' => $tags->whereIn('name', ['Climate Action', 'Sustainable Farming'])->pluck('id')->toArray(),
            ],
            [
                'title' => 'Clean Water Projects Empowering Rural Communities',
                'slug' => 'clean-water-projects-empowering-rural-communities-' . Str::random(5),
                'summary' => 'Access to clean water is transforming lives and supporting agriculture in remote villages through Divafam’s initiatives.',
                'content' => 'Water is life, yet many rural communities in Africa struggle with access to clean, safe water for drinking and irrigation. Divafam’s Clean Water Projects target these critical needs, empowering women and families to live healthier, more productive lives. We install and maintain boreholes, rainwater harvesting systems, and community wells in partnership with local leaders. Beyond infrastructure, Divafam trains women on water conservation techniques and hygiene best practices, reducing waterborne illnesses. Access to reliable water also enhances agricultural productivity. With improved irrigation, women farmers can diversify crops, increase yields, and generate income to support their households. The success stories are inspiring—villages once plagued by drought now flourish, children attend school regularly, and health improves markedly. Divafam remains dedicated to scaling these projects and ensuring no community is left behind.',
                'status' => 'published',
                'published_at' => now(),
                'is_approved' => true,
                'is_active' => true,
                'is_featured' => false,
                'cover_image' => null,
                'views' => rand(50, 500),
                'category_id' => rand(1, 5),
                'author_id' => $user->id,
                'tags' => $tags->whereIn('name', ['Clean Water', 'Community Development'])->pluck('id')->toArray(),
            ],
            [
                'title' => 'Training the Next Generation of Farmers',
                'slug' => 'training-the-next-generation-of-farmers-' . Str::random(5),
                'summary' => 'Youth empowerment is central to Divafam’s mission to ensure sustainable agriculture and community growth.',
                'content' => 'Youth represent the future of agriculture in Africa, yet many lack access to education and training that would prepare them for farming careers. Divafam addresses this gap through targeted Youth Training programs that blend modern techniques with traditional knowledge. Participants learn about organic farming, pest management, and post-harvest handling. Our workshops also include financial literacy and entrepreneurial skills to help young farmers build sustainable businesses. One remarkable participant, Chinedu, started a community garden that now supplies fresh vegetables to local schools. He credits Divafam’s mentorship for inspiring his vision and providing the tools needed to succeed. By investing in young farmers, Divafam helps build resilient communities and contributes to national food security. Our ongoing commitment ensures that agriculture remains a viable and rewarding career path for generations to come.',
                'status' => 'published',
                'published_at' => now(),
                'is_approved' => true,
                'is_active' => true,
                'is_featured' => true,
                'cover_image' => null,
                'views' => rand(50, 500),
                'category_id' => rand(1, 5),
                'author_id' => $user->id,
                'tags' => $tags->whereIn('name', ['Youth Training', 'Sustainable Farming'])->pluck('id')->toArray(),
            ],
            [
                'title' => 'Microfinance and Seed Grants: Fueling Farmer Success',
                'slug' => 'microfinance-and-seed-grants-fueling-farmer-success-' . Str::random(5),
                'summary' => 'Divafam connects rural farmers with financial tools that unlock new opportunities for growth and sustainability.',
                'content' => 'Financial inclusion remains a major challenge for rural farmers, particularly women, who often lack collateral or credit history. Divafam’s microfinance and seed grant programs bridge this gap by providing accessible funding and resources to boost farm productivity. Through partnerships with local banks and cooperatives, we offer low-interest loans, flexible repayment terms, and seed capital for agricultural inputs. These financial tools empower farmers to invest in better seeds, tools, and irrigation systems. Additionally, Divafam organizes training on business planning and financial management to maximize the impact of these resources. The results speak for themselves—farmers are expanding operations, increasing incomes, and contributing to local economies. By reducing financial barriers, Divafam is creating an ecosystem where farmers can thrive sustainably and confidently.',
                'status' => 'published',
                'published_at' => now(),
                'is_approved' => true,
                'is_active' => true,
                'is_featured' => false,
                'cover_image' => null,
                'views' => rand(50, 500),
                'category_id' => rand(1, 5),
                'author_id' => $user->id,
                'tags' => $tags->whereIn('name', ['Microfinance', 'Women Empowerment'])->pluck('id')->toArray(),
            ],
        ];

        foreach ($posts as $postData) {
            $tagsForPost = $postData['tags'];
            unset($postData['tags']);

            $post = Post::create($postData);

            // Get tag names from the tag IDs before attaching
            $tagNames = Tag::whereIn('id', $tagsForPost)->pluck('name')->toArray();

            // Update or create SEO data
            $post->seo()->updateOrCreate([], [
                'meta_title' => $post->title,
                'meta_description' => $post->summary,
                'meta_keywords' => implode(', ', $tagNames),
            ]);

            // Attach tags to pivot
            $post->tags()->attach($tagsForPost);
        }


    }
}
