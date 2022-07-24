@extends('layouts.dashboard')

@section('title-tag')
سهم تولید ناخالص داخلی استان
@endsection

@section('breadcrumb-title')
سهم تولید ناخالص داخلی استان
@endsection

@section('page-title')
سهم تولید ناخالص داخلی استان

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
                    <form class="form-horizontal" method="POST" action="{{ route('gdp.part.update', $gdpPart) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component
                            province_default="{{ $gdpPart->province_id }}"
                            zone_default="{{ $gdpPart->county->zone }}"
                            county_default="{{ $gdpPart->county_id }}"
                            city_default="{{ $gdpPart->city_id }}"
                            rural_district_default="{{ $gdpPart->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="part">
                                <span> بخش </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="part" id="part" class="form-select">
                                    @foreach (config('gostaresh.parts') as $key => $value)
                                        <option {{ $key == $gdpPart->part ? 'selected' : '' }} value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount">
                                <span> مقدار (درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount" name="amount" value="{{ $gdpPart->amount }}"
                                    class="form-control" placeholder="مقدار را به درصد وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$gdpPart->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$gdpPart->month" :required="false" name="month"></x-select-month>

                        

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
