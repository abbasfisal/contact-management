<?php

namespace App\Services\ContactService\Database\Seeders;

use App\Services\ContactService\Models\Operator;
use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Operator::query()->firstOrCreate([
            'first_name' => 'Reza',
            'last_name'  => 'Karimi',
            'status'     => 'free',
        ]);

        Operator::query()->firstOrCreate([
            'first_name' => 'Mohammad',
            'last_name'  => 'Naseri',
            'status'     => 'free',
        ]);

        $this->command->info('****** Operators Seeded ! ********');
    }
}
