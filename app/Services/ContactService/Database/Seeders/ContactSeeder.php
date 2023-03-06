<?php

namespace App\Services\ContactService\Database\Seeders;

use App\Services\ContactService\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::query()->firstOrCreate([
            'customer_id'       => 1,
            'status_id'         => 2,
            'category_id'       => 2,
            'operator_id'       => 1,
            'satisfaction_rate' => 5,
            'duration'          => "00:00:30",
            'comment'           => 'tes comments goes here',
            'called_number'     => '0935678975',
        ]);
        $this->command->info('***** Contacts Seeded ! *********');
    }
}
