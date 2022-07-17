<?php

use Illuminate\Http\Request;

if (!function_exists('convertPersianToEnglish')) {
    function convertPersianToEnglish($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $output = str_replace($persian, $english, $string);
        return $output;
    }
}

if (!function_exists('convertPersianToEnglishInInputRequests')) {
    function convertPersianToEnglishInInputRequests(Request $request)
    {
        if (is_array($request->except('_token')) && count($request->except('_token')) > 0) {
            $arr = [];
            foreach ($request->except('_token') as $key => $part) {
                $arr[$key] = convertPersianToEnglish($part);
            }
            $request->merge($arr);
        }
        return $request;
    }
}

if (!function_exists('filterCol')) {
    function filterCol(string $fieldName)
    {
        if (request()->has($fieldName)) {
            if (request()->input($fieldName) == 1) {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            if (request()->query() == null || request()->query("all")==1) {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}

if (!function_exists('filterByOwnProvince')) {
    function filterByOwnProvince($query)
    {
        if (!auth()->user()->hasRole('admin'))
        {
            if (isset(auth()->user()->city_id))
                $query->where('city_id', auth()->user()->city_id);

            elseif (isset(auth()->user()->county_id))
                $query->where('county_id', auth()->user()->county_id);

            elseif (isset(auth()->user()->province_id))
                $query->where('province_id', auth()->user()->province_id);

        }
        return $query;
    }
}
