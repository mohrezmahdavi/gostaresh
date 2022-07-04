@extends('layouts.dashboard')

@section('title-tag')
    تعداد میانگین ھزینه ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('breadcrumb-title')
    تعداد میانگین ھزینه ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('page-title')
    تعداد میانگین ھزینه ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('cost-of-majors.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
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
                                <th>دانشگاه</th>
                                <th>جنسیت</th>
                                <th>گروه عمده تحصیلی</th>
                                <th>کاردانی</th>
                                <th>کارشناسی</th>
                                <th>کارشناسی ارشد</th>
                                <th>دکتری</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($costOfMajors as $key => $costOfMajor)
                                <tr>
                                    <th scope="row">{{ $costOfMajors?->firstItem() + $key }}</th>
                                    <td>{{ $costOfMajor?->province?->name . ' - ' . $costOfMajor->county?->name }}
                                    <td>{{ $costOfMajor?->university_type_title}}</td>
                                    <td>{{ $costOfMajor?->gender}}</td>
                                    <td>{{ $costOfMajor?->department_of_education_title}}</td>
                                    <td>{{ $costOfMajor?->associate_degree }}</td>
                                    <td>{{ $costOfMajor?->bachelor_degree }}</td>
                                    <td>{{ $costOfMajor?->masters }}</td>
                                    <td>{{ $costOfMajor?->phd }}</td>
                                    <td>{{ $costOfMajor?->year }}</td>
                                    <td>

                                        <a href="{{ route('cost-of-majors.edit', $costOfMajor) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $costOfMajor) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $costOfMajors->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
