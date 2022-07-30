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
        //
        Grade::insert([
            [
                'slug' => 'associate-degree',
                'name' => 'کاردانی'
            ],
            [
                'slug' => 'bachelors-degree',
                'name' => 'کارشناسی'
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
        ]);
    }
}
