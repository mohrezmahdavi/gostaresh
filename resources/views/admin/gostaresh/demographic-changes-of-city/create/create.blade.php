@extends('layouts.dashboard')

@section('title-tag')
    افزودن روند تحولات جمعیتی شهرستان های استان
@endsection

@section('breadcrumb-title')
افزودن روند تحولات جمعیتی شهرستان های استان
@endsection

@section('page-title')
افزودن روند تحولات جمعیتی شهرستان های استان
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
                    <form class="form-horizontal" method="POST" action="{{ route('admin.user.store') }}" role="form">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="population">
                                <span> جمعیت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="population" name="population" value="{{ old('population') }}"
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

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="year">
                                <span> سال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="year" id="year" class="form-select" >
                                    @for ($i = 1250; $i <= 1405, $i++)
                                    <option {{ ($i == old('year') ? 'selected' : '') }} value="{{ $i }}">{{ $i }}</option>
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
                                <select name="month" id="month" class="form-select" >
                                    @for ($i = 1; $i <= 12, $i++)
                                    <option {{ ($i == old('month') ? 'selected' : '') }} value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                    
                                </select>
                                
                            </div>
                        </div>

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