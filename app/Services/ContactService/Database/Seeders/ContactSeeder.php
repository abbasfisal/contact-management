<?php

namespace App\Services\ContactService\Database\Seeders;

use App\Services\ContactService\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Contact::query()->firstOrCreate([
//            'customer_id'       => 1,
//            'status_id'         => 2,
//            'category_id'       => 2,
//            'operator_id'       => 1,
//            'satisfaction_rate' => 4,
//            'duration'          => Carbon::createFromTime(0,0,10)->toTimeString(),
//            'comment'           => 'test comments goes here',
//            'called_number'     => '0935678975',
//        ]);

        Contact::query()->firstOrCreate([
            'customer_id'       => 1,
            'status_id'         => 1,
            'category_id'       => 1,
            'operator_id'       => 1,
            'satisfaction_rate' => 4,
            'duration'          => Carbon::createFromTime(0, 0, 10)->toTimeString(),
            'comment'           => 'this comment',
            'called_number'     => '03648897987'
        ]);

        $this->command->info('***** Contacts Seeded ! *********');
    }
}
