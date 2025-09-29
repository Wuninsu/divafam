<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->insert([
            [
                'question' => "What is Divafam’s mission?",
                'answer' => "Divafam (formerly Diva Farms) empowers women and youth through sustainable vegetable farming, education, clean water access, farmer health support, and grassroots climate awareness. We cultivate more than crops — we cultivate futures.",
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "Who can join Divafam’s training programs?",
                'answer' => "Our programs are open to young people, women, and marginalized community members who want to learn sustainable farming, business skills, and community leadership for self-sustaining livelihoods.",
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "How does Divafam use donations?",
                'answer' => "Every donation, no matter how small, is treated with rigorous care. Funds support training programs, boreholes for clean water, farmer health initiatives, education for marginalized groups, and climate resilience projects.",
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "How can I get involved with Divafam?",
                'answer' => "You can join as a trainee, volunteer, donor, or partner. Whether through financial contributions, sharing expertise, or offering community support — every action strengthens our impact.",
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "How does Divafam ensure transparency?",
                'answer' => "We publish both our success metrics and setbacks openly. This fosters honest dialogue, faster course-corrections, and stronger trust with our partners and the communities we serve.",
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question' => "How can I contact Divafam for support or partnership?",
                'answer' => "You can reach us through our website contact form, by email at <a href=\"mailto:info@divafam.org\">info@divafam.org</a>, or via our community engagement team.",
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
