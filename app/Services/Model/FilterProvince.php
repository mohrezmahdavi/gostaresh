<?php

namespace App\Services\Model;

class FilterProvince
{
    public static function filter($query)
    {
        if (request('rural_district_id'))
        {
            return $query->where('rural_district_id', request('rural_district_id'));
        }

        if (request('city_id'))
        {
            return $query->where('city_id', request('city_id'));
        }

        if (request('county_id'))
        {
            return $query->where('county_id', request('county_id'));
        }

        if (request('province_id'))
        {
            return $query->where('province_id', request('province_id'));
        }
    }
}
