@extends('layouts.dashboard')

@section('title-tag')
    ویرایش نرخ فقر شهرستان های استان
@endsection

@section('breadcrumb-title')
    ویرایش نرخ فقر شهرستان های استان
@endsection

@section('page-title')
    ویرایش نرخ فقر شهرستان های استان
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
                        action="{{ route('multiple.deprivation.index.of.city.update', $povertyOfProvincialCity) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $povertyOfProvincialCity->province_id }}"
                            county_default="{{ $povertyOfProvincialCity->county_id }}"
                            city_default="{{ $povertyOfProvincialCity->city_id }}"
                            rural_district_default="{{ $povertyOfProvincialCity->rural_district_id }}">
                        </select-province-component>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount">
                                <span>مقدار </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount" name="amount"
                                    value="{{ $povertyOfProvincialCity->amount }}" class="form-control"
                                    placeholder=" مقدار را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$povertyOfProvincialCity->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$povertyOfProvincialCity->month" :required="false" name="month"></x-select-month>

                        

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
