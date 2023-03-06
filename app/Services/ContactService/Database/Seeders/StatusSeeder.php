<?php

namespace App\Services\ContactService\Database\Seeders;

use App\Services\ContactService\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::query()->firstOrCreate([
            'title' => 'تماس برقرار شد',
            'slug'  => 'c1'
        ]);

        Status::query()->firstOrCreate([
            'title' => 'تماس با موفقیت به اتمام رسید',
            'slug'  => 'c2'
        ]);

        Status::query()->firstOrCreate([
            'title' => 'تماس توسط مشتری حین مکالمه قطع شد',
            'slug'  => 'c3'
        ]);

        Status::query()->firstOrCreate([
            'title' => 'تماس انتقال داده شد',
            'slug'  => 'c4'
        ]);
        Status::query()->firstOrCreate([
            'title' => 'تماس به صف انتقال داده شد',
            'slug'  => 'c5'
        ]);
        Status::query()->firstOrCreate([
            'title' => 'تماس توسط اپراتور دریافت شد',
            'slug'  => 'c6'
        ]);
        Status::query()->firstOrCreate([
            'title' => 'تماس توسط مشتری کنسل شد',
            'slug'  => 'c7'
        ]);
        Status::query()->firstOrCreate([
            'title' => 'تماس توسط مشتری در صف قطع شد',
            'slug'  => 'c8'
        ]);

        Status::query()->firstOrCreate([
            'title' => 'عدم برقراری ارتباط',
            'slug'  => 'c9'
        ]);

        $this->command->info('******** Status data Seeded!**********');

    }
}
