{{-- Table 49 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل روند تغییرات وضعیت درآمد ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل روند تغییرات وضعیت درآمد ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    ویرایش تحلیل روند تغییرات وضعیت درآمد ھای دانشگاه در واحدھای شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('revenue-changes.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                    <form class="form-horizontal" method="POST" action="{{ route('revenue-changes.update', $revenueChange) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $revenueChange->province_id ?? ''}}"
                            zone_default="{{ $revenueChange->county->zone ?? ''}}"
                            county_default="{{ $revenueChange->county_id ?? ''}}" city_default="{{ $revenueChange->city_id ?? ''}}"
                            rural_district_default="{{ $revenueChange->rural_district_id ?? ''}}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit" value="{{ $revenueChange->unit }}"
                                    class="form-control" placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_annual_income">
                                <span>کل درآمد های سالیانه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="total_annual_income" name="total_annual_income"
                                    value="{{ $revenueChange->total_annual_income }}" class="form-control"
                                    placeholder=" کل درآمد های سالیانه را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$revenueChange->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$revenueChange->month" :required="false" name="month"></x-select-month> --}}



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
