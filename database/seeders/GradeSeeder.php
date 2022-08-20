<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::truncate();

        Grade::insert([
            [
                'slug' => 'continuous-associate',
                'name' => 'کاردانی پیوسته'
            ],
            [
                'slug' => 'continuous-bachelor',
                'name' => 'کارشناسی پیوسته'
            ],
            [
                'slug' => 'masters-degree',
                'name' => 'کارشناسی ارشد'
            ],
            [
                'slug' => 'professional-doctor',
                'name' => 'دکتری حرفه ای'
            ],
            [
                'slug' => 'PhD',
                'name' => 'دکتری تخصصی(Ph.D)'
            ],
            [
                'slug' => 'discontinuous-associate',
                'name' => 'کاردانی ناپیوسته'
            ],
            [
                'slug' => 'discontinuous-bachelor',
                'name' => 'کارشناسی ناپیوسته'
            ],
            [
                'slug' => 'continuous-masters',
                'name' => 'کارشناسی ارشد پیوسته'
            ],
            [
                'slug' => 'continuous-Ph.D',
                'name' => 'دکترای پیوسته'
            ]
        ]);
    }
}
