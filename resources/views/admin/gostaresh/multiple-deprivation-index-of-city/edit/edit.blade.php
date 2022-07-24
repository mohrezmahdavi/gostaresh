@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت شاخص محرومیت چندگانه
@endsection

@section('breadcrumb-title')
ویرایش تحلیل وضعیت شاخص محرومیت چندگانه
@endsection

@section('page-title')
ویرایش تحلیل وضعیت شاخص محرومیت چندگانه

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
                    <form class="form-horizontal" method="POST"
                        action="{{ route('multiple.deprivation.index.of.city.update', $multipleDeprivationIndexOfCity) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $multipleDeprivationIndexOfCity->province_id }}"
                            zone_default="{{ $multipleDeprivationIndexOfCity->county->zone }}"
                            county_default="{{ $multipleDeprivationIndexOfCity->county_id }}"
                            city_default="{{ $multipleDeprivationIndexOfCity->city_id }}"
                            rural_district_default="{{ $multipleDeprivationIndexOfCity->rural_district_id }}">
                        </select-province-component>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount">
                                <span>مقدار </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount" name="amount"
                                    value="{{ $multipleDeprivationIndexOfCity->amount }}" class="form-control"
                                    placeholder=" مقدار را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$multipleDeprivationIndexOfCity->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$multipleDeprivationIndexOfCity->month" :required="false" name="month"></x-select-month>



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
