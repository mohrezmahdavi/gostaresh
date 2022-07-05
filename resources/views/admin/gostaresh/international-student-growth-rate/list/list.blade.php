@extends('layouts.dashboard')

@section('title-tag')
نرخ رشد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی
@endsection

@section('breadcrumb-title')
نرخ رشد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی
@endsection

@section('page-title')
نرخ رشد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی
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
                                    <th>شهرستان</th>
                                    <th>واحد دانشگاهی</th>
                                    <th>رشته تحصیلی</th>
                                    <th>جنسیت</th>
                                    <th>کاردانی</th>
                                    <th>کارشناسی</th>
                                    <th>کارشناسی ارشد</th>
                                    <th>دکتری</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($internationalStudentGrowthRates as $key => $internationalStudentGrowthRate)
                                    <tr>
                                        <th scope="row">{{ $internationalStudentGrowthRates?->firstItem() + $key }}</th>

                                        <td>{{ $internationalStudentGrowthRate?->province?->name . ' - ' . $internationalStudentGrowthRate->county?->name }}</td>
                                        <td>{{ $internationalStudentGrowthRate?->unit }}</td>
                                        <td>{{ $internationalStudentGrowthRate?->department_of_education_title }}</td>
                                        <td>{{ $internationalStudentGrowthRate?->gender_title }}</td>
                                        <td>{{ $internationalStudentGrowthRate?->kardani_count }}</td>
                                        <td>{{ $internationalStudentGrowthRate?->karshenasi_count }}</td>
                                        <td>{{ $internationalStudentGrowthRate?->karshenasi_arshad_count }}</td>
                                        <td>{{ $internationalStudentGrowthRate?->docktora_count }}</td>

                                        <td>{{ $internationalStudentGrowthRate?->year }}</td>
                                        <td>

                                            <a href="{{ route('international.student.growth.rate.edit', $internationalStudentGrowthRate) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="{{ route('international.student.growth.rate.destroy', $internationalStudentGrowthRate) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $internationalStudentGrowthRates->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
