<?php

namespace App\Exports\Gostaresh\StatusAnalysisOfTheNumberOfFieldsOfStudy;

use App\Models\Index\StatusAnalysisOfTheNumberOfFieldsOfStudy;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $statusAnalysisOfTheNumberOfFieldsOfStudies;
    private $count = 0;

    public function __construct($statusAnalysisOfTheNumberOfFieldsOfStudies)
    {
        $this->statusAnalysisOfTheNumberOfFieldsOfStudies = $statusAnalysisOfTheNumberOfFieldsOfStudies;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->statusAnalysisOfTheNumberOfFieldsOfStudies;
    }


    public function map($statusAnalysisOfTheNumberOfFieldsOfStudy): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfFieldsOfStudy?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->unit);
        }
        if (filterCol('total_number_of_fields_of_study') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->total_number_of_fields_of_study);
        }
        if (filterCol('number_of_international_courses') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_international_courses);
        }
        if (filterCol('number_of_virtual_courses') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_virtual_courses);
        }
        if (filterCol('number_of_technical_disciplines') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_technical_disciplines);
        }
        if (filterCol('number_of_courses_not_accepted') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_not_accepted);
        }
        if (filterCol('number_of_courses_without_volunteers') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_without_volunteers);
        }
        if (filterCol('number_of_GDP_courses') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_GDP_courses);
        }
        if (filterCol('number_of_disciplines_corresponding_to_job_fields') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_disciplines_corresponding_to_job_fields);
        }
        if (filterCol('number_of_fields_corresponding_to_the_specified_specialties') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_fields_corresponding_to_the_specified_specialties);
        }
        if (filterCol('number_of_courses_offered_virtually') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_offered_virtually);
        }
        if (filterCol('number_of_popular_fields_more_than_eighty_percent_capacity') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_popular_fields_more_than_eighty_percent_capacity);
        }
        if (filterCol('number_of_courses_with_low_audience') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_with_low_audience);
        }
        if (filterCol('number_of_fields_of_less_than_5_people') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_fields_of_less_than_5_people);
        }
        if (filterCol('number_of_courses_without_admission') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_courses_without_admission);
        }
        if (filterCol('number_of_popular_fields') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->number_of_popular_fields);
        }
        if (filterCol('low_number_of_applicants') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->low_number_of_applicants);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfFieldsOfStudy?->year);
        }
        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        $filterColumnsCheckBoxes = StatusAnalysisOfTheNumberOfFieldsOfStudy::$filterColumnsCheckBoxes;
        array_push($headings, 'شهرستان');
        foreach ($filterColumnsCheckBoxes as $key => $value)
        {
            if (filterCol($key))
            {
                array_push($headings, $value);
            }
        }     
        return $headings;
    }
}
