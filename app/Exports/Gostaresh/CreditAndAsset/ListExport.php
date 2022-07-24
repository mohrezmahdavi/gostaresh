<?php

namespace App\Exports\Gostaresh\CreditAndAsset;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $creditAndAssets;
    private $count = 0;

    public function __construct($creditAndAssets)
    {
        $this->creditAndAssets = $creditAndAssets;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->creditAndAssets;
    }
   
    public function map($creditAndAssets): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $creditAndAssets?->province?->name . ' - ' . $creditAndAssets?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $creditAndAssets?->unit);
        }
        if (filterCol('administrative_credits') == true) {
            array_push($mapping, number_format((int) $creditAndAssets?->administrative_credits ));
        }
        if (filterCol('educational_credits') == true) {
            array_push($mapping, number_format((int) $creditAndAssets?->educational_credits ));
        }
        if (filterCol('research_credits') == true) {
            array_push($mapping, number_format((int) $creditAndAssets?->research_credits ));
        }
        if (filterCol('cultural_credits') == true) {
            array_push($mapping, number_format((int) $creditAndAssets?->cultural_credits ));
        }
        if (filterCol('innovative_credits') == true) {
            array_push($mapping, number_format((int) $creditAndAssets?->innovative_credits ));
        }
        if (filterCol('skills_credits') == true) {
            array_push($mapping, number_format((int) $creditAndAssets?->skills_credits ));
        }
        if (filterCol('total_University_credits') == true) {
            array_push($mapping, number_format((int) $creditAndAssets?->total_University_credits ));
        }
        if (filterCol('total_university_assets') == true) {
            array_push($mapping, number_format((int) $creditAndAssets?->total_university_assets ));
        }

        array_push($mapping, $creditAndAssets?->year);
        array_push($mapping, $creditAndAssets?->month);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {                                                       
            array_push($headings, 'واحد');
        }
        if (filterCol('administrative_credits') == true) {                                                       
            array_push($headings, 'اعتبارات اداری');
        }
        if (filterCol('educational_credits') == true) {                                                       
            array_push($headings, 'اعتبارات آموزشی');
        }
        if (filterCol('research_credits') == true) {                                                       
            array_push($headings, 'اعتبارات پژوهشی');
        }
        if (filterCol('cultural_credits') == true) {                                                       
            array_push($headings, 'اعتبارات فرهنگی');
        }
        if (filterCol('innovative_credits') == true) {                                                       
            array_push($headings, 'اعتبارات فناورانه و نوآورانه');
        }
        if (filterCol('skills_credits') == true) {                                                       
            array_push($headings, 'اعتبارات حوزه مهارتی');
        }
        if (filterCol('total_University_credits') == true) {                                                       
            array_push($headings, 'کل اعتبارات دانشگاه');
        }
        if (filterCol('total_university_assets') == true) {                                                       
            array_push($headings, 'کل دارایی های دانشگاه');
        }

        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        
        return $headings;
    }

}
