<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks=0');
        DB::table('users')->truncate();

        User::create([
            'first_name' => 'نعیم',
            'last_name' => 'محمودی',
            'phone_number' => '09023238787',
        ]);

        User::create([
            'first_name' => 'مهدی',
            'last_name' => 'ابراهیمی',
            'phone_number' => '09122594301',
        ]);

        User::create([
            'first_name' => 'دکتر',
            'last_name' => 'آزادیان',
            'phone_number' => '09123713955',
        ]);

        User::create([
            'first_name' => 'سعید',
            'last_name' => 'پارسایی',
            'phone_number' => '09399528826',
        ]);

        User::create([
            'first_name' => 'متین',
            'last_name' => 'اقبالی',
            'phone_number' => '09367683492',
        ]);

        User::create([
            'first_name' => 'محرض',
            'last_name' => 'مهدوی',
            'phone_number' => '09194744799',
        ]);
    }
}
