{{--Table 55 View--}}
@extends('layouts.dashboard')

@section('title-tag')
ایجاد میانگین ھزینھ ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('breadcrumb-title')
ایجاد میانگین ھزینھ ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی
@endsection

@section('page-title')
ایجاد میانگین ھزینھ ناشی از اجرای رشته ھای تحصیلی در گروه ھا و مقاطع مختلف تحصیلی
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
                    <form class="form-horizontal" method="POST" action="{{ route('cost-of-majors.store') }}" role="form">
                        @csrf

                        <select-province-component></select-province-component>

                        <select-grade-component></select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="university_type">
                                <span>دانشگاه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="university_type" name="university_type"
                                       value="{{ old('university_type') }}" class="form-control"
                                       placeholder=" دانشگاه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_cost_of_majors">
                                <span>میانگین هزینه ناشی از اجرای رشته </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_cost_of_majors" name="average_cost_of_majors"
                                       value="{{ old('average_cost_of_majors') }}" class="form-control"
                                       placeholder=" میانگین هزینه ناشی از اجرای رشته را وارد کنید...">
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