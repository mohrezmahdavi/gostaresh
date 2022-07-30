<?php

namespace Database\Seeders;

use App\Models\Minor;
use Illuminate\Database\Seeder;

class MinorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Minor::insert([
            [

                'name' => 'عمومی',
                'major_id'=>'1'
            ],
            [

                'name' => 'عمومی',
                'major_id'=>'2'
            ],
            [

                'name' => 'عمومی',
                'major_id'=>'3'
            ],

            [

                'name' => 'عمومی',
                'major_id'=>'4'
            ],
            [

                'name' => 'عمومی',
                'major_id'=>'5'
            ],
            [

                'name' => 'عمومی',
                'major_id'=>'6'
            ],
            [

                'name' => 'موسیقی',
                'major_id'=>'7'
            ],
            [

                'name' => 'گرافیک',
                'major_id'=>'7'
            ],


        ]);
    }
}
