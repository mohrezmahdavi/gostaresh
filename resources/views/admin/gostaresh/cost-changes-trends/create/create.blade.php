{{--Table 54 View--}}
@extends('layouts.dashboard')

@section('title-tag')
ایجاد تحلیل روند تغییرات وضعیت ھزینه ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
ایجاد تحلیل روند تغییرات وضعیت ھزینه ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
ایجاد تحلیل روند تغییرات وضعیت ھزینه ھای دانشگاه در واحدھای شھرستان ھای استان
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    <form class="form-horizontal" method="POST" action="{{ route('cost-changes-trends.store') }}" role="form">
                        @csrf

                        <select-province-component></select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{ old('unit') }}" class="form-control"
                                       placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_annual_expenses">
                                <span>کل هزینه های سالیانه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_annual_expenses" name="total_annual_expenses"
                                       value="{{ old('total_annual_expenses') }}" class="form-control"
                                       placeholder=" کل هزینه های سالیانه را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="old('year')" :required="false" name="year"></x-select-year>

                        <x-select-month :default="old('month')" :required="false" name="month"></x-select-month>

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
