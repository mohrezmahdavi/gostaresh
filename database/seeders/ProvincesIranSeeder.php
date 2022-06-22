<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvincesIranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::truncate();

        $provinces = array(
            array('id' => '1', 'country_id' => 1, 'name' => 'آذربایجان شرقی', 'code' => '03', 'short_code' => '03', 'status' => '1'),
            array('id' => '2', 'country_id' => 1, 'name' => 'آذربایجان غربی', 'code' => '04', 'short_code' => '04', 'status' => '1'),
            array('id' => '3', 'country_id' => 1, 'name' => 'اردبیل', 'code' => '24', 'short_code' => '24', 'status' => '1'),
            array('id' => '4', 'country_id' => 1, 'name' => 'اصفهان', 'code' => '10', 'short_code' => '10', 'status' => '1'),
            array('id' => '5', 'country_id' => 1, 'name' => 'البرز', 'code' => '30', 'short_code' => '30', 'status' => '1'),
            array('id' => '6', 'country_id' => 1, 'name' => 'ایلام', 'code' => '16', 'short_code' => '16', 'status' => '1'),
            array('id' => '7', 'country_id' => 1, 'name' => 'بوشهر', 'code' => '18', 'short_code' => '18', 'status' => '1'),
            array('id' => '8', 'country_id' => 1, 'name' => 'تهران', 'code' => '23', 'short_code' => '23', 'status' => '1'),
            array('id' => '9', 'country_id' => 1, 'name' => 'چهارمحال و بختیاری', 'code' => '14', 'short_code' => '14', 'status' => '1'),
            array('id' => '10', 'country_id' => 1, 'name' => 'خراسان جنوبی', 'code' => '29', 'short_code' => '29', 'status' => '1'),
            array('id' => '11', 'country_id' => 1, 'name' => 'خراسان رضوی', 'code' => '09', 'short_code' => '09', 'status' => '1'),
            array('id' => '12', 'country_id' => 1, 'name' => 'خراسان شمالی', 'code' => '28', 'short_code' => '28', 'status' => '1'),
            array('id' => '13', 'country_id' => 1, 'name' => 'خوزستان', 'code' => '06', 'short_code' => '06', 'status' => '1'),
            array('id' => '14', 'country_id' => 1, 'name' => 'زنجان', 'code' => '19', 'short_code' => '19', 'status' => '1'),
            array('id' => '15', 'country_id' => 1, 'name' => 'سمنان', 'code' => '20', 'short_code' => '20', 'status' => '1'),
            array('id' => '16', 'country_id' => 1, 'name' => 'سیستان و بلوچستان', 'code' => '11', 'short_code' => '11', 'status' => '1'),
            array('id' => '17', 'country_id' => 1, 'name' => 'فارس', 'code' => '07', 'short_code' => '07', 'status' => '1'),
            array('id' => '18', 'country_id' => 1, 'name' => 'قزوین', 'code' => '26', 'short_code' => '26', 'status' => '1'),
            array('id' => '19', 'country_id' => 1, 'name' => 'قم', 'code' => '25', 'short_code' => '25', 'status' => '1'),
            array('id' => '20', 'country_id' => 1, 'name' => 'کردستان', 'code' => '12', 'short_code' => '12', 'status' => '1'),
            array('id' => '21', 'country_id' => 1, 'name' => 'کرمان', 'code' => '08', 'short_code' => '08', 'status' => '1'),
            array('id' => '22', 'country_id' => 1, 'name' => 'کرمانشاه', 'code' => '05', 'short_code' => '05', 'status' => '1'),
            array('id' => '23', 'country_id' => 1, 'name' => 'کهگیلویه و بویراحمد', 'code' => '17', 'short_code' => '17', 'status' => '1'),
            array('id' => '24', 'country_id' => 1, 'name' => 'گلستان', 'code' => '27', 'short_code' => '27', 'status' => '1'),
            array('id' => '25', 'country_id' => 1, 'name' => 'گیلان', 'code' => '01', 'short_code' => '01', 'status' => '1'),
            array('id' => '26', 'country_id' => 1, 'name' => 'لرستان', 'code' => '15', 'short_code' => '15', 'status' => '1'),
            array('id' => '27', 'country_id' => 1, 'name' => 'مازندران', 'code' => '02', 'short_code' => '02', 'status' => '1'),
            array('id' => '28', 'country_id' => 1, 'name' => 'مرکزی', 'code' => '00', 'short_code' => '00', 'status' => '1'),
            array('id' => '29', 'country_id' => 1, 'name' => 'هرمزگان', 'code' => '22', 'short_code' => '22', 'status' => '1'),
            array('id' => '30', 'country_id' => 1, 'name' => 'همدان', 'code' => '13', 'short_code' => '13', 'status' => '1'),
            array('id' => '31', 'country_id' => 1, 'name' => 'یزد', 'code' => '21', 'short_code' => '21', 'status' => '1')
        );
        // $provinces = array(
        //     array('country_id' => 1, 'name' => 'آذربايجان شرقي'),
        //     array('country_id' => 1, 'name' => 'آذربايجان غربي'),
        //     array('country_id' => 1, 'name' => 'اردبيل'),
        //     array('country_id' => 1, 'name' => 'اصفهان'),
        //     array('country_id' => 1, 'name' => 'البرز'),
        //     array('country_id' => 1, 'name' => 'ايلام'),
        //     array('country_id' => 1, 'name' => 'بوشهر'),
        //     array('country_id' => 1, 'name' => 'تهران'),
        //     array('country_id' => 1, 'name' => 'چهارمحال بختياري'),
        //     array('country_id' => 1, 'name' => 'خراسان جنوبي'),
        //     array('country_id' => 1, 'name' => 'خراسان رضوي'),
        //     array('country_id' => 1, 'name' => 'خراسان شمالي'),
        //     array('country_id' => 1, 'name' => 'خوزستان'),
        //     array('country_id' => 1, 'name' => 'زنجان'),
        //     array('country_id' => 1, 'name' => 'سمنان'),
        //     array('country_id' => 1, 'name' => 'سيستان و بلوچستان'),
        //     array('country_id' => 1, 'name' => 'فارس'),
        //     array('country_id' => 1, 'name' => 'قزوين'),
        //     array('country_id' => 1, 'name' => 'قم'),
        //     array('country_id' => 1, 'name' => 'كردستان'),
        //     array('country_id' => 1, 'name' => 'كرمان'),
        //     array('country_id' => 1, 'name' => 'كرمانشاه'),
        //     array('country_id' => 1, 'name' => 'كهكيلويه و بويراحمد'),
        //     array('country_id' => 1, 'name' => 'گلستان'),
        //     array('country_id' => 1, 'name' => 'گيلان'),
        //     array('country_id' => 1, 'name' => 'لرستان'),
        //     array('country_id' => 1, 'name' => 'مازندران'),
        //     array('country_id' => 1, 'name' => 'مركزي'),
        //     array('country_id' => 1, 'name' => 'هرمزگان'),
        //     array('country_id' => 1, 'name' => 'همدان'),
        //     array('country_id' => 1, 'name' => 'يزد')
        // );
        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}
