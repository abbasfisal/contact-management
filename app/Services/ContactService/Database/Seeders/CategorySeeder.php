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
        Category::query()->create([
            'title'       => 'Sell',
            'description' => 'sell section',
            'is_active'   => true
        ]);
    }
}
