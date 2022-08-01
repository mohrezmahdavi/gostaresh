<?php
$titles = [
    'success_delete' => 'با موفقیت حذف شد.',
    'success_store'  => 'با موفقیت ایجاد شد.',
    'success_update' => 'با موفقیت ویرایش شد.',
    'view'           => 'نمایش',
    'create'         => 'ایجاد',
    'edit'           => 'تغییر',
    'delete'         => 'حذف',
    'groups'         => 'گروه ها',
    'group'          => 'گروه',
    'status'         => 'وضعیت',
    'name'           => 'نام',
    'id'             => 'شناسه',
    'users'          => 'کاربران',
    'created_at'     => 'ایجاد شده',
    'updated_at'     => 'ویرایش شده',
    'actions'        => 'اقدام',
    'new_group'      => 'گروه جدید',
    'edit_group'     => 'ویرایش گروه',
];

$modelsTitles = [
    "City"          => "شهر",
    "Country"       => "کشور",
    "County"        => "شهرستان",
    "Grade"         => "مقطع تحصیلی",
//    "Major"         => "شهر",
//    "Minor"         => "شهر",
    "Province"      => "استان",
    "RuralDistrict" => "ناحیه روستایی",
    "SubGrade"      => "زیر سطح",
    "User"          => "کاربر",
    "Role"          => "گروه",
    "Permission"    => "دسترسی"
];

$gostareshModels = config("gostaresh-urls.url");

$gostareshModelTitles = [];

foreach ($gostareshModels as $titleGroup)
    foreach ($titleGroup as $models)
        foreach ($models as $model) {
            $modelArray = explode("\\", $model["model"]);
            $gostareshModelTitles[end($modelArray)] = $model["title"];
        }

return $titles + $modelsTitles + $gostareshModelTitles;
