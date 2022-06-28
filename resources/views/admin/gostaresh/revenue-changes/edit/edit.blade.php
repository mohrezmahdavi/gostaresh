{{--Table 49 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل روند تغییرات وضعیت درآمد ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل روند تغییرات وضعیت درآمد ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    ویرایش تحلیل روند تغییرات وضعیت درآمد ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    @include('admin.partials.row-notifiy-col')
                    <form class="form-horizontal" method="POST"
                        action="{{ route('revenue-changes.update', $revenueChange) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $revenueChange->province_id }}"
                            county_default="{{ $revenueChange->county_id }}"
                            city_default="{{ $revenueChange->city_id }}"
                            rural_district_default="{{ $revenueChange->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{ $revenueChange->unit }}" class="form-control"
                                       placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_annual_income">
                                <span>کل درآمد های سالیانه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_annual_income" name="total_annual_income"
                                       value="{{ $revenueChange->total_annual_income }}" class="form-control"
                                       placeholder=" کل درآمد های سالیانه را وارد کنید...">
                            </div>
                        </div>
                        
                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="year">
                                <span> سال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="year" id="year" class="form-select">
                                    @for ($i = 1250; $i <= 1405; $i++)
                                        <option {{ $i == $revenueChange->year ? 'selected' : '' }}
                                            value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="month">
                                <span> ماه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="month" id="month" class="form-select">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option {{ $i == $revenueChange->month ? 'selected' : '' }}
                                            value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

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
