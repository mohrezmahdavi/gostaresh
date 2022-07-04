@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت سلامت اجتماعی در طرح سیمای زندگی در واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت سلامت اجتماعی در طرح سیمای زندگی در واحدھای دانشگاھی استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت سلامت اجتماعی در طرح سیمای زندگی در واحدھای دانشگاھی استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('social-health.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                <th>مولفه</th>
                                <th>جنسیت</th>
                                <th>کاردانی</th>
                                <th>کارشناسی</th>
                                <th>کارشناسی ارشد</th>
                                <th>دکتری حرفه ای</th>
                                <th>دکتری تخصصی</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($socialHealths as $key => $socialHealth)
                                <tr>
                                    <th scope="row">{{ $socialHealths?->firstItem() + $key }}</th>
                                    <td>{{ $socialHealth?->province?->name . ' - ' . $socialHealth->county?->name }}
                                    <td>{{ $socialHealth?->unit}}</td>
                                    <td>{{ $socialHealth?->component_title}}</td>
                                    <td>{{ $socialHealth?->gender}}</td>
                                    <td>{{ $socialHealth?->associate_degree }}</td>
                                    <td>{{ $socialHealth?->bachelor_degree }}</td>
                                    <td>{{ $socialHealth?->masters }}</td>
                                    <td>{{ $socialHealth?->professional_doctor}}</td>
                                    <td>{{ $socialHealth?->phd }}</td>
                                    <td>{{ $socialHealth?->year }}</td>
                                    <td>

                                        <a href="{{ route('social-health.edit', $socialHealth) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $socialHealth) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $socialHealths->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
