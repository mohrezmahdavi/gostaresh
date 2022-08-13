@extends('layouts.dashboard')

@section('title-tag')
ویرایش وضعیت نرخ مشارکت اقتصادی
@endsection

@section('breadcrumb-title')
ویرایش وضعیت نرخ مشارکت اقتصادی
@endsection

@section('page-title')
ویرایش وضعیت نرخ مشارکت اقتصادی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('economic.participation.rate.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                    <form class="form-horizontal" method="POST"
                        action="{{ route('economic.participation.rate.update', $economicParticipationRate) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $economicParticipationRate->province_id }}"
                            zone_default="{{ $economicParticipationRate->county->zone }}"
                            county_default="{{ $economicParticipationRate->county_id }}"
                            city_default="{{ $economicParticipationRate->city_id }}"
                            rural_district_default="{{ $economicParticipationRate->rural_district_id }}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount">
                                <span>سهم تولید ناخالصی داخلی استان (درصد) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount" name="amount"
                                    value="{{ $economicParticipationRate->amount }}" class="form-control"
                                    placeholder=" مقدار را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="education_id">
                                <span> تحصیلات </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="education_id" id="education_id" class="form-select">
                                    @foreach (config('gostaresh.education') as $key => $value)
                                        <option {{ $key == $economicParticipationRate->education_id ? 'selected' : '' }}
                                            value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach


                                </select>

                            </div>
                        </div>


                        <x-select-year :default="$economicParticipationRate->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$economicParticipationRate->month" :required="false" name="month"></x-select-month> --}}

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
