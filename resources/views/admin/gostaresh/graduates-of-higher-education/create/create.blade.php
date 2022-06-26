{{--Table 32 View--}}
@extends('layouts.dashboard')

@section('title-tag')
ایجاد کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به تفکیک مقطع و گروه عمده تحصیلی و جنسیت
@endsection

@section('breadcrumb-title')
ایجاد کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به تفکیک مقطع و گروه عمده تحصیلی و جنسیت
@endsection

@section('page-title')
ایجاد کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به تفکیک مقطع و گروه عمده تحصیلی و جنسیت
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST" action="{{ route('graduates-of-higher-education.store') }}" role="form">
                        @csrf

                        {{--<select-province-component></select-province-component>--}}

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="university">
                                <span>دانشگاه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="university" name="university"
                                       value="{{ old('university') }}" class="form-control"
                                       placeholder=" دانشگاه را وارد کنید...">
                            </div>
                        </div>

                        <select-grade-component></select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_graduates">
                                <span>کل دانش آموختگان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_graduates" name="total_graduates"
                                       value="{{ old('total_graduates') }}" class="form-control"
                                       placeholder=" کل دانش آموختگان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="year">
                                <span> سال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="year" id="year" class="form-select">
                                    @for ($i = 1250; $i <= 1405; $i++)
                                        <option {{ $i == old('year') ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="month">
                                <span> ماه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="month" id="month" class="form-select">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option {{ $i == old('month') ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary  mt-3">افزودن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
