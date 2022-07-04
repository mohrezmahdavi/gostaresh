@extends('layouts.dashboard')

@section('title-tag')
    افزودن روند تحولات جمعیتی شهرستان های استان
@endsection

@section('breadcrumb-title')
افزودن روند تحولات جمعیتی شهرستان های استان
@endsection

@section('page-title')
افزودن روند تحولات جمعیتی شهرستان های استان

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
                    <form class="form-horizontal" method="POST" action="{{ route('demographic.changes.city.store') }}" role="form">
                        @csrf


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="population">
                                <span> جمعیت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="population" min="0" max="18446744073709551615" name="population" value="{{ old('population') }}"
                                    class="form-control" placeholder="جمعیت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="immigration_rates">
                                <span> نرخ مهاجرت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="immigration_rates" name="immigration_rates" value="{{ old('immigration_rates') }}"
                                    class="form-control" placeholder="نرخ مهاجرت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="growth_rate">
                                <span> نرخ رشد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="growth_rate" name="growth_rate" value="{{ old('growth_rate') }}"
                                    class="form-control" placeholder="نرخ رشد را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="old('year')" :required="true" name="year"></x-select-year>

                        <x-select-month :default="old('month')" :required="false" name="month"></x-select-month>

                        <select-province-component></select-province-component>

                        

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
