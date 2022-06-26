@extends('layouts.dashboard')

@section('title-tag')
    ویرایش نرخ مشارکت اقتصادی (به تفکیک جمعیت تحصیل کرده/فاقد تحصیلات)
@endsection

@section('breadcrumb-title')
    ویرایش نرخ مشارکت اقتصادی (به تفکیک جمعیت تحصیل کرده/فاقد تحصیلات)
@endsection

@section('page-title')
    ویرایش نرخ مشارکت اقتصادی (به تفکیک جمعیت تحصیل کرده/فاقد تحصیلات)
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
                        action="{{ route('economic.participation.rate.update', $economicParticipationRate) }}"
                        role="form">
                        @csrf
                        <select-province-component province_default="{{ $economicParticipationRate->province_id }}"
                            county_default="{{ $economicParticipationRate->county_id }}"
                            city_default="{{ $economicParticipationRate->city_id }}"
                            rural_district_default="{{ $economicParticipationRate->rural_district_id }}">
                        </select-province-component>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount">
                                <span>مقدار </span>&nbsp
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
                                    @foreach (config('titles.education') as $key => $value)
                                        <option {{ $key == $economicParticipationRate->education_id ? 'selected' : '' }}
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
                                        <option {{ $i == $economicParticipationRate->year ? 'selected' : '' }}
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
                                        <option {{ $i == $economicParticipationRate->month ? 'selected' : '' }}
                                            value="{{ $i }}">
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
