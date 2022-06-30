@extends('layouts.dashboard')

@section('title-tag')
میزان ظرفیت پذیرش دانشجو	
@endsection

@section('breadcrumb-title')
میزان ظرفیت پذیرش دانشجو	
@endsection

@section('page-title')
میزان ظرفیت پذیرش دانشجو	
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">
        
                                <tr>
                                    <th>#</th>
                                    <th>شهرستان </th>
                                    <th>دانشگاه </th>
                                    <th>جنسیت</th>
                                    <th>گروه عمده تحصیلی</th>
                                    <th>مقدار</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentAdmissionCapacities as $key => $studentAdmissionCapacity)
                                    <tr>
                                        <th scope="row">{{ $studentAdmissionCapacities?->firstItem() + $key }}</th>
        
                                        <td>{{ $studentAdmissionCapacity?->province?->name . ' - ' . $averageTestScoreOfTheLastFivePercentOfAdmitted->county?->name }}
                                        </td>
                                        <td>{{ $studentAdmissionCapacity?->university_type_title }}</td>
                                        <td>{{ $studentAdmissionCapacity?->gender_title }}</td>
                                        <td>{{ $studentAdmissionCapacity?->department_of_education_title }}</td>
                                        <td>{{ $studentAdmissionCapacity?->student_admission_capacities }}</td>
                                        <td>{{ $studentAdmissionCapacity?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('average.test.score.of.the.last.five.percent.of.admitted.edit', $studentAdmissionCapacity) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('average.test.score.of.the.last.five.percent.of.admitted.destroy', $studentAdmissionCapacity) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $studentAdmissionCapacities->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
