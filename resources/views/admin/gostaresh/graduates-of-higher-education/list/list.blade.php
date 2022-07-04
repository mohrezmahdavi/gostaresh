{{--Table 32 View--}}
@extends('layouts.dashboard')

@section('title-tag')
     تعداد کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به تفکیک مقطع و گروه عمده تحصیلی و جنسیت
@endsection

@section('breadcrumb-title')
     تعداد کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به تفکیک مقطع و گروه عمده تحصیلی و جنسیت
@endsection

@section('page-title')
     تعداد کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به تفکیک مقطع و گروه عمده تحصیلی و جنسیت

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('graduates-of-higher-education.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                            @foreach ($graduatesOfHigherEducationCenters as $key => $graduatesOfHigherEducationCenter)
                                <tr>
                                    <th scope="row">{{ $graduatesOfHigherEducationCenters?->firstItem() + $key }}</th>
                                    <td>{{ $graduatesOfHigherEducationCenter?->province?->name . ' - ' . $graduatesOfHigherEducationCenter->county?->name }}
                                    <td>{{$graduatesOfHigherEducationCenter?->university}}</td>
                                    <td>{{$graduatesOfHigherEducationCenter?->gender}}</td>
                                    <td>{{$graduatesOfHigherEducationCenter?->department_of_education_title}}</td>
                                    <td>{{ $graduatesOfHigherEducationCenter?->associate_degree }}</td>
                                    <td>{{ $graduatesOfHigherEducationCenter?->bachelor_degree }}</td>
                                    <td>{{ $graduatesOfHigherEducationCenter?->masters }}</td>
                                    <td>{{ $graduatesOfHigherEducationCenter?->phd }}</td>
                                    <td>{{ $graduatesOfHigherEducationCenter?->year }}</td>
                                    <td>

                                        <a href="{{ route('graduates-of-higher-education.edit', $graduatesOfHigherEducationCenter) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

{{--                                        <a href="{{ route('graduates-of-higher-education.destroy', $graduatesOfHigherEducationCenter) }}" title="{{ __('validation.buttons.delete') }}"--}}
{{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $graduatesOfHigherEducationCenters->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
