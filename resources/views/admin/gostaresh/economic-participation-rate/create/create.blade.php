@extends('layouts.dashboard')

@section('title-tag')
ایجاد  درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('breadcrumb-title')
ایجاد  درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('page-title')
ایجاد  درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    <form class="form-horizontal" method="POST" action="{{ route('economic.participation.rate.store') }}" role="form">
                        @csrf
                        <select-province-component></select-province-component>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount">
                                <span>مقدار </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount" name="amount"
                                    value="{{ old('amount') }}" class="form-control"
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
                                    @foreach (config('titles.education') as $key => $value)
                                        <option {{ $key == old('education_id') ? ' selected' : '' }} 
                                            value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach


                                </select>

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
