@extends('layouts.dashboard')

@section('title-tag')
    ویرایش روند تحولات جمعیتی شهرستان های استان
@endsection

@section('breadcrumb-title')
    ویرایش روند تحولات جمعیتی شهرستان های استان
@endsection

@section('page-title')
    ویرایش روند تحولات جمعیتی شهرستان های استان
    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    <form class="form-horizontal" method="POST" action="{{ route('demographic.changes.city.update', $demographicChangesOfCity) }}" role="form">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="population">
                                <span> جمعیت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="population" name="population" value="{{ $demographicChangesOfCity->population }}"
                                    class="form-control" placeholder="جمعیت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="immigration_rates">
                                <span> نرخ مهاجرت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="immigration_rates" name="immigration_rates" value="{{ $demographicChangesOfCity->immigration_rates }}"
                                    class="form-control" placeholder="نرخ مهاجرت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="growth_rate">
                                <span> نرخ رشد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="growth_rate" name="growth_rate" value="{{ $demographicChangesOfCity->growth_rate }}"
                                    class="form-control" placeholder="نرخ رشد را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$demographicChangesOfCity->year" min="1390" max="1400" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$demographicChangesOfCity->month" :required="false" name="month"></x-select-month> --}}

                        <select-province-component
                            province_default="{{ $demographicChangesOfCity->province_id }}"
                            zone_default="{{ $demographicChangesOfCity->county->zone }}"
                            county_default="{{ $demographicChangesOfCity->county_id }}"
                            city_default="{{ $demographicChangesOfCity->city_id }}"
                            rural_district_default="{{ $demographicChangesOfCity->rural_district_id }}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>

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
