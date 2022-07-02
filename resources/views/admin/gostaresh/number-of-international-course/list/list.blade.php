@extends('layouts.dashboard')

@section('title-tag')
تعداد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی استان
@endsection

@section('breadcrumb-title')
تعداد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی استان
@endsection

@section('page-title')
تعداد دانشجویان غیرایرانی و بین الملل واحدهای دانشگاهی استان
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
                                    <th>واحد دانشگاهی </th>
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
                                @foreach ($numberOfInternationalCourses as $key => $numberOfInternationalCourse)
                                    <tr>
                                        <th scope="row">{{ $numberOfInternationalCourses?->firstItem() + $key }}</th>
        
                                        <td>{{ $numberOfInternationalCourse?->province?->name . ' - ' . $numberOfInternationalCourse->county?->name }}
                                        </td>
                                        <td>{{ $numberOfInternationalCourse?->unit }}</td>
                                        <td>{{ $numberOfInternationalCourse?->gender_title }}</td>
                                        <td>{{ $numberOfInternationalCourse?->department_of_education_title }}</td>
                                        <td>{{ $numberOfInternationalCourse?->kardani_count }}</td>
                                        <td>{{ $numberOfInternationalCourse?->karshenasi_count }}</td>
                                        <td>{{ $numberOfInternationalCourse?->karshenasi_arshad_count }}</td>
                                        <td>{{ $numberOfInternationalCourse?->docktora_count }}</td>

                                        <td>{{ $numberOfInternationalCourse?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('number.of.international.course.edit', $numberOfInternationalCourse) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('number.of.international.course.destroy', $numberOfInternationalCourse) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfInternationalCourses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
