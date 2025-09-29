<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\Donor;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $donors = [
            [
                'name' => 'John Doe',
                'contact_person' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '+233541234567',
                'type' => 'individual',
                'address' => 'Tamale, Ghana',
                'donation' => ['amount' => 500, 'currency' => 'USD', 'notes' => 'Support for training'],
            ],
            [
                'name' => 'Global Aid Foundation',
                'contact_person' => 'Sarah Johnson',
                'email' => 'sarah@globalaid.org',
                'phone' => '+233501112233',
                'type' => 'corporate',
                'address' => 'Accra, Ghana',
                'donation' => ['amount' => 10000, 'currency' => 'USD', 'notes' => 'Corporate sponsorship'],
            ],
            [
                'name' => 'Hope International',
                'contact_person' => 'Michael Lee',
                'email' => 'michael@hope.org',
                'phone' => '+233209876543',
                'type' => 'foundation',
                'address' => 'Kumasi, Ghana',
                'donation' => ['amount' => 3000, 'currency' => 'USD', 'notes' => 'Medical supplies for community'],
            ],
            [
                'name' => 'Charity Ghana',
                'contact_person' => 'Ama Boateng',
                'email' => 'ama@charitygh.org',
                'phone' => '+233244556677',
                'type' => 'corporate',
                'address' => 'Cape Coast, Ghana',
                'donation' => ['amount' => 1500, 'currency' => 'GHS', 'notes' => 'Books for children'],
            ],
            [
                'name' => 'Goodwill Network',
                'contact_person' => 'David Mensah',
                'email' => 'david@goodwill.org',
                'phone' => '+233276543210',
                'type' => 'individual',
                'address' => 'Bolgatanga, Ghana',
                'donation' => ['amount' => 750, 'currency' => 'USD', 'notes' => 'Youth empowerment fund'],
            ],
        ];

        foreach ($donors as $data) {
            $donor = Donor::create([
                'name' => $data['name'],
                'contact_person' => $data['contact_person'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'type' => $data['type'],
                'address' => $data['address'],
            ]);

            Donation::create([
                'donor_id' => $donor->id,
                'amount' => $data['donation']['amount'],
                'currency' => $data['donation']['currency'],
                'donation_type' => 'cash',
                'donation_date' => now(),
                'notes' => $data['donation']['notes'],
            ]);

            Sponsorship::create([
                'donor_id' => $donor->id,
                'project_id' => rand(1, 3), // random project between 1 and 3
                'amount' => $data['donation']['amount'],
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
                'status' => 'active',
            ]);
        }
    }
}
