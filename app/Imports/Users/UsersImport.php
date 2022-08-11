<?php

namespace App\Imports\Users;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Rules\StringWithoutNumberRule;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row)
        {
            $data = [
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'phone_number' => $row['phone_number'],
                'status' => $row['status'],
                'email' => $row['email'] ?? null,
                'country_id' => $row['country_id'] ?? 1,
                'province_id' => $row['province_id'] ?? null,
                'county_id' => $row['county_id'] ?? null,
                'city_id' => $row['city_id'] ?? null,
                'rural_district_id' => $row['rural_district_id'] ?? null
            ];
            $user = User::create($data);
        }
        // $user->syncRoles($request->roles);
    }

    public function rules(): array
    {
        return [
            'first_name' => ['string', 'required', new StringWithoutNumberRule],
            'last_name' => ['string', 'required', new StringWithoutNumberRule],
            'phone_number' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,phone_number',
            'country_id' => 'numeric|nullable',
            'province_id' => 'numeric|nullable',
            'county_id' => 'numeric|nullable',
            'city_id' => 'numeric|nullable',
            'rural_district_id' => 'numeric|nullable',
            'address' => 'string|nullable',
            'status' => 'numeric|nullable',
            'user_picture' => 'nullable|image',
            'roles' => 'nullable|exists:roles,id'
        ];
    }
}
