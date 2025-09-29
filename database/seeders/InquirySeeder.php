<?php

namespace Database\Seeders;

use App\Models\Inquiry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inquiries = [
            [
                'name' => 'Issah Mohammed',
                'email' => 'issah@gmail.com',
                'phone' => '0501234567',
                'type' => 'inquiry',
                'subject' => 'Partnership Request',
                'message' => 'I’d like to partner with Divafam on training.',
                'status' => 0,
                'responded' => 1,
            ],
            [
                'name' => 'Adam Ibrahim',
                'email' => 'adam@company.com',
                'type' => 'testimony',
                'position' => 'CEO, ABC Org',
                'image' => null,
                'message' => 'Divafam’s support was life-changing!',
                'status' => 1,
                'responded' => 0,
            ],
            [
                'name' => 'Sarah Adams',
                'email' => 'sarah@yahoo.com',
                'type' => 'feedback',
                'subject' => 'Training Improvement',
                'message' => 'The training was great but needs more practicals.',
                'status' => 0,
                'responded' => 0,
            ],
            [
                'name' => 'Michael Brown',
                'email' => 'mike@donor.org',
                'phone' => '0245678901',
                'type' => 'inquiry',
                'subject' => 'Donation Inquiry',
                'message' => 'How do I donate to ongoing projects?',
                'status' => 0,
                'responded' => 0,
            ],
            [
                'name' => 'Grace Johnson',
                'email' => 'grace@ngo.org',
                'type' => 'testimony',
                'position' => 'Community Leader',
                'image' => null,
                'message' => 'Divafam transformed our village through education!',
                'status' => 1,
                'responded' => 1,
            ],
        ];

        foreach ($inquiries as $data) {
            Inquiry::create($data);
        }
    }
}
