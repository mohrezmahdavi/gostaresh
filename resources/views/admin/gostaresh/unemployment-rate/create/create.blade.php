@extends('layouts.dashboard')

@section('title-tag')
ایجاد وضعیت نرخ بیکاری (به تفکیک جمعیت تحصیل کرده/فاقد تحصیلات)
@endsection

@section('breadcrumb-title')
ایجاد وضعیت نرخ بیکاری (به تفکیک جمعیت تحصیل کرده/فاقد تحصیلات)
@endsection

@section('page-title')
ایجاد وضعیت نرخ بیکاری (به تفکیک جمعیت تحصیل کرده/فاقد تحصیلات)
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
                    <form class="form-horizontal" method="POST" action="{{ route('unemployment.rate.store') }}" role="form">
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
                                    @foreach (config('gostaresh.education') as $key => $value)
                                        <option {{ $key == old('education_id') ? ' selected' : '' }} 
                                            value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach


                                </select>

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
                                        <option {{ $i == old('year') ? 'selected' : '' }} value="{{ $i }}">
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
                                        <option {{ $i == old('month') ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

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