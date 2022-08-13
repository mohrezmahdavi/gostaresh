@extends('layouts.dashboard')

@section('title-tag')
ویرایش روند تغییرات سهم تولید ناخالص داخلی شهرستان در مقایسه با تولید ناخالص داخلی
@endsection

@section('breadcrumb-title')
ویرایش روند تغییرات سهم تولید ناخالص داخلی شهرستان در مقایسه با تولید ناخالص داخلی
@endsection

@section('page-title')
ویرایش روند تغییرات سهم تولید ناخالص داخلی شهرستان در مقایسه با تولید ناخالص داخلی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('gdp.city.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                    <form class="form-horizontal" method="POST" action="{{ route('gdp.city.update', $gdpCity) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $gdpCity->province_id }}"
                            zone_default="{{ $gdpCity->county->zone }}" county_default="{{ $gdpCity->county_id }}"
                            city_default="{{ $gdpCity->city_id }}"
                            rural_district_default="{{ $gdpCity->rural_district_id }}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount">
                                <span> سهم تولید ناخالصی داخلی شهرستان (درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount" name="amount" value="{{ $gdpCity->amount }}"
                                    class="form-control" placeholder="مقدار را به درصد وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$gdpCity->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year">
                        </x-select-year>

                        {{-- <x-select-month :default="$gdpCity->month" :required="false" name="month"></x-select-month> --}}



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
