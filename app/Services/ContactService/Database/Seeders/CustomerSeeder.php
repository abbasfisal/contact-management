<?php

namespace App\Services\ContactService\Database\Seeders;

use App\Services\ContactService\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Customer::query()->firstOrCreate([
            'first_name'  => 'customer 1 first-name',
            'last_name'   => 'customer 1 last-name',
            'mobile'      => '09356743672',
            'address'     => 'Tehran , enghelab street ',
            'postal_code' => '97654231',
        ]);
        $this->command->info('****** Customers Seeded ! ********');

    }
}
