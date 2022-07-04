@extends('layouts.dashboard')

@section('title-tag')
    ویرایش سهم تولید ناخالص داخلی شهرستان
@endsection

@section('breadcrumb-title')
ویرایش سهم تولید ناخالص داخلی شهرستان
@endsection

@section('page-title')
ویرایش سهم تولید ناخالص داخلی شهرستان

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
                    <form class="form-horizontal" method="POST" action="{{ route('gdp.city.update', $gdpCity) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component
                            province_default="{{ $gdpCity->province_id }}"
                            county_default="{{ $gdpCity->county_id }}"
                            city_default="{{ $gdpCity->city_id }}"
                            rural_district_default="{{ $gdpCity->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount">
                                <span> مقدار (درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount" name="amount" value="{{ $gdpCity->amount }}"
                                    class="form-control" placeholder="مقدار را به درصد وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$gdpCity->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$gdpCity->month" :required="false" name="month"></x-select-month>

                        

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
