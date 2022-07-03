{{--Table 38 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش میزان تسھیلات و حمایت ھای مالی صورت گرفته از دستاوردھای پژوھشی اساتید و دانشجویان در دوره 10 سال
@endsection

@section('breadcrumb-title')
    ویرایش میزان تسھیلات و حمایت ھای مالی صورت گرفته از دستاوردھای پژوھشی اساتید و دانشجویان در دوره 10 سال
@endsection

@section('page-title')
    ویرایش میزان تسھیلات و حمایت ھای مالی صورت گرفته از دستاوردھای پژوھشی اساتید و دانشجویان در دوره 10 سال
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    <form class="form-horizontal" method="POST"
                        action="{{ route('amount-of-facilities.update', $amountOfFacility) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $amountOfFacility->province_id }}"
                            county_default="{{ $amountOfFacility->county_id }}"
                            city_default="{{ $amountOfFacility->city_id }}"
                            rural_district_default="{{ $amountOfFacility->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{ $amountOfFacility->unit }}" class="form-control"
                                       placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount">
                                <span>میزان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount" name="amount"
                                       value="{{ $amountOfFacility->amount }}" class="form-control"
                                       placeholder=" میزان را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$amountOfFacility->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$amountOfFacility->month" :required="false" name="month"></x-select-month>

                        <button type="submit" class="btn btn-primary  mt-3">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
