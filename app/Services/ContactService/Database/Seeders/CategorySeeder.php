<?php

namespace App\Services\ContactService\Database\Seeders;

use App\Services\ContactService\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->firstOrCreate([
            'title'       => 'Sell',
            'description' => 'sell section',
            'is_active'   => true
        ]);

        Category::query()->firstOrCreate([
            'title'       => 'Contact Us',
            'description' => 'contact us section',
            'is_active'   => true
        ]);

        Category::query()->firstOrCreate([
            'title'       => 'Support',
            'description' => 'Support Section',
            'is_active'   => true
        ]);

        $this->command->info('******** Category data Seeded!**********');
    }
}
