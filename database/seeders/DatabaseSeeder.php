<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\ContactService\Database\Seeders\CategorySeeder;
use App\Services\ContactService\Database\Seeders\ContactSeeder;
use App\Services\ContactService\Database\Seeders\CustomerSeeder;
use App\Services\ContactService\Database\Seeders\OperatorSeeder;
use App\Services\ContactService\Database\Seeders\StatusSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(OperatorSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ContactSeeder::class);

    }
}
