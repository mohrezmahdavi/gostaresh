@extends('layouts.dashboard')

@section('title-tag')
    تعداد میانگین درآمدھی شھریه ای در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('breadcrumb-title')
    تعداد میانگین درآمدھی شھریه ای در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('page-title')
    تعداد میانگین درآمدھی شھریه ای در گروه ھا و مقاطع مختلف تحصیلی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('tuition-income.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>واحد</th>
                                <th>دانشگاه</th>
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
                            @foreach ($tuitionIncome as $key => $value)
                                <tr>
                                    <th scope="row">{{ $tuitionIncome?->firstItem() + $key }}</th>
                                    <td>{{ $value?->province?->name . ' - ' . $value->county?->name }}
                                    <td>{{ $value?->unit}}</td>
                                    <td>{{ $value?->university_type_title}}</td>
                                    <td>{{ $value?->department_of_education_title}}</td>
                                    <td>{{ $value?->associate_degree }}</td>
                                    <td>{{ $value?->bachelor_degree }}</td>
                                    <td>{{ $value?->masters }}</td>
                                    <td>{{ $value?->phd }}</td>
                                    <td>{{ $value?->year }}</td>
                                    <td>

                                        <a href="{{ route('tuition-income.edit', $value) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $value) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $tuitionIncome->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
