<?php

namespace App\Exports\Gostaresh\RoadmapDesired;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $roadmapDesireds;
    private $count = 0;

    public function __construct($roadmapDesireds)
    {
        $this->roadmapDesireds = $roadmapDesireds;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->roadmapDesireds;
    }
   
    public function map($roadmapDesireds): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $roadmapDesireds?->province?->name . ' - ' . $roadmapDesireds?->county?->name);

        if (filterCol('experimental_policy_title') == true) {
            array_push($mapping, $roadmapDesireds?->experimental_policy_title);
        }
        if (filterCol('title_axis') == true) {
            array_push($mapping, $roadmapDesireds?->title_axis);
        }
        if (filterCol('project_title') == true) {
            array_push($mapping, $roadmapDesireds?->project_title);
        }
        if (filterCol('quantitative_goal') == true) {
            array_push($mapping, $roadmapDesireds?->quantitative_goal);
        }
        if (filterCol('test') == true) {
            array_push($mapping, $roadmapDesireds?->test);
        }
        if (filterCol('annual_progress_level') == true) {
            array_push($mapping, $roadmapDesireds?->annual_progress_level);
        }
        if (filterCol('responsible_for_track') == true) {
            array_push($mapping, $roadmapDesireds?->responsible_for_track);
        }
        if (filterCol('considerations') == true) {
            array_push($mapping, $roadmapDesireds?->considerations);
        }

        array_push($mapping, $roadmapDesireds?->year);
        array_push($mapping, $roadmapDesireds?->month);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('experimental_policy_title') == true) {                                                       
            array_push($headings, 'عنوان سیاست آزمایشی');
        }
        if (filterCol('title_axis') == true) {                                                       
            array_push($headings, 'عنوان محور');
        }
        if (filterCol('project_title') == true) {                                                       
            array_push($headings, 'عنوان پروژه');
        }
        if (filterCol('quantitative_goal') == true) {                                                       
            array_push($headings, 'هدف کمی');
        }
        if (filterCol('test') == true) {                                                       
            array_push($headings, 'سنجش');
        }
        if (filterCol('annual_progress_level') == true) {                                                       
            array_push($headings, 'سطح پیشرفت و تحقق سالانه');
        }
        if (filterCol('responsible_for_track') == true) {                                                       
            array_push($headings, 'مسئول پیگیری');
        }
        if (filterCol('considerations') == true) {                                                       
            array_push($headings, 'ملاحظات');
        }

        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        
        return $headings;
    }
}
