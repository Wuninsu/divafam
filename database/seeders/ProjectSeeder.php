<?php

namespace Database\Seeders;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Women in Tech Bootcamp',
                'short_description' => 'Empowering young Ghanaian women with digital skills.',
                'description' => "The Women in Tech Bootcamp is a transformative initiative aimed at bridging the digital divide among young women in Ghana. With the rapid evolution of technology and its integration into virtually every sector, it is critical that women are not left behind. This project targets 100 women aged 18–30 from Accra and surrounding communities, with the goal of equipping them with practical skills in areas such as web development, mobile app design, cybersecurity, and digital marketing. The bootcamp runs for 12 weeks and includes both in-person workshops and online learning. Participants are mentored by industry professionals and provided with the tools necessary to build and launch their own projects. Beyond technical training, the program offers sessions on personal development, leadership, and career guidance. By the end of the program, graduates will have the confidence and capabilities to either seek employment in the tech industry or start their own ventures. We believe this initiative contributes directly to Ghana’s economic growth by boosting female participation in the digital economy and reducing gender inequality in STEM fields.",
                'status' => 'ongoing',
            ],
            [
                'title' => 'Rural School Renovation Project',
                'short_description' => 'Renovating rural schools to improve learning environments.',
                'description' => "Many schools in rural Ghana suffer from poor infrastructure, inadequate classrooms, and lack of basic amenities. The Rural School Renovation Project focuses on restoring and upgrading these learning environments to create safe, clean, and functional spaces for students and teachers. This project started with a needs assessment in three rural districts—Sunyani West, Zabzugu, and Wassa Amenfi. Based on the findings, the first phase involves renovating six schools, including repairs to roofing, walls, windows, and floors. Sanitation facilities will also be upgraded, and furniture like desks, blackboards, and bookshelves will be provided. Community involvement is at the heart of this initiative. Local artisans and youth are hired during construction, fostering job creation and ownership. Teachers are also trained to maintain the improved facilities, ensuring long-term sustainability. The ultimate goal is to boost school attendance and improve student performance, especially for girls, who are disproportionately affected by poor school conditions. By creating a safe and dignified learning space, this project helps reduce the dropout rate and lays a foundation for educational equity in underprivileged areas of Ghana.",
                'status' => 'completed',
            ],
            [
                'title' => 'Clean Water for Every Village',
                'short_description' => 'Bringing safe drinking water to underserved rural communities.',
                'description' => "In Ghana, access to clean drinking water remains a challenge in many rural communities. The Clean Water for Every Village project aims to provide reliable sources of potable water to 20 villages across the Northern and Upper East regions. Using borehole drilling and water purification technology, the initiative directly tackles waterborne diseases and the time-consuming burden of water collection, especially for women and children. Each village is assessed by our field team in partnership with local chiefs and community leaders. Once approved, boreholes are drilled using eco-friendly equipment. We train locals to maintain the wells and establish Water Committees to oversee long-term usage and repairs. Additionally, educational workshops are conducted on hygiene and water conservation. This project not only improves public health but also frees up time for girls to attend school and women to engage in income-generating activities. The impact is long-lasting, with sustainability baked into the implementation strategy. By delivering clean water where it is needed most, this project directly supports the UN Sustainable Development Goal 6 (Clean Water and Sanitation) and improves the quality of life for thousands of Ghanaians.",
                'status' => 'ongoing',
            ],
            [
                'title' => 'Girls’ Leadership Academy',
                'short_description' => 'Building leadership and confidence in adolescent girls.',
                'description' => "The Girls’ Leadership Academy is an intensive program designed to foster leadership, self-confidence, and advocacy skills among adolescent girls in Ghana. The initiative targets girls between the ages of 13 and 19 from underserved communities, where access to mentorship and leadership training is minimal or non-existent. The academy spans 8 weekends and includes workshops on public speaking, critical thinking, gender rights, goal setting, and community service. Each participant is paired with a female mentor working in leadership roles across various industries, from education to politics and business. The project aims to challenge societal norms that often silence or diminish girls' voices and to inspire a generation of change-makers. Participants are also encouraged to design and implement community projects in their schools or hometowns, which are supported by mini-grants and ongoing mentorship. By nurturing leadership at an early age, the Girls’ Leadership Academy is shaping the next wave of empowered women leaders who can influence policy, build strong communities, and break generational cycles of inequality.",
                'status' => 'draft',
            ],
            [
                'title' => 'Nutrition for Children Program',
                'short_description' => 'Combating child malnutrition in deprived communities.',
                'description' => "Malnutrition remains a significant public health issue in Ghana, particularly among children under the age of five. The Nutrition for Children Program is a targeted intervention that seeks to address this challenge through a combination of food support, parental education, and community health partnerships. This project operates in three major regions—Upper West, Northern, and Oti—and collaborates with local clinics, women’s groups, and schools. At the core of the initiative is a community-based nutrition center, where families can receive food packages, nutritional counseling, and health screenings. Mothers are educated on how to prepare balanced meals using locally available ingredients, and they participate in cooking demonstrations and peer support groups. Children are monitored monthly for weight, height, and general well-being. Severe cases of malnutrition are referred to medical professionals for immediate care.The project is also implementing school-feeding programs that ensure every enrolled child receives at least one hot nutritious meal per day. This not only improves nutrition but also boosts school attendance. With long-term community involvement and support from regional health directorates, this program is helping reduce child mortality, improve development outcomes, and build healthier futures for vulnerable Ghanaian children.",
                'status' => 'completed',
            ],
        ];

        $locations = ['Tolon', 'Yendi', 'Tamale', 'Damongo', 'Kunbungu', 'Nyankpala', 'Bolgatanga'];
        $tags = ['education', 'health', 'entrepreneurship', 'technology', 'sanitation', 'youth', 'women empowerment'];

        foreach ($projects as $proj) {
            $startDate = Carbon::now()->subDays(rand(30, 180));
            $endDate = (clone $startDate)->addDays(rand(60, 180));
            $budget = rand(20000, 80000);
            $spent = rand(5000, $budget - 2000);
            $category = rand(1, 15);

            Project::create([
                'category_id' => $category,
                'title' => $proj['title'],
                'slug' => Str::slug($proj['title']),
                'short_description' => $proj['short_description'],
                'description' => $proj['description'],
                'cover_image' => null,
                'status' => $proj['status'],
                'start_date' => $startDate->toDateString(),
                'end_date' => $endDate->toDateString(),
                'location' => $locations[array_rand($locations)],
                'budget' => $budget,
                'amount_spent' => $spent,
                'is_featured' => rand(0, 1),
                'is_active' => rand(0, 1),
                'tags' => collect($tags)->random(rand(2, 4))->implode(', '),
                'user_id' => 1,
            ]);
        }
    }
}
