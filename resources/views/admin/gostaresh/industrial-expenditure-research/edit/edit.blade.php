@extends('layouts.dashboard')

@section('title-tag')
    ویرایش  درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('breadcrumb-title')
    ویرایش درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
@endsection

@section('page-title')
    ویرایش  درصد هزینه‌کرد بخش صنعت در تحقیق‌ و توسعه
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
                    <form class="form-horizontal" method="POST" action="{{ route('industrial.expenditure.research.update', $industrialExpenditureResearch) }}"
                        role="form">
                        @csrf
                        <select-province-component province_default="{{ $industrialExpenditureResearch->province_id }}"
                            county_default="{{ $industrialExpenditureResearch->county_id }}" city_default="{{ $industrialExpenditureResearch->city_id }}"
                            rural_district_default="{{ $industrialExpenditureResearch->rural_district_id }}">
                        </select-province-component>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount">
                                <span>میزان هزینه کرد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="amount" name="amount"
                                    value="{{ $industrialExpenditureResearch->amount }}" class="form-control"
                                    placeholder="میزان هزینه کرد را وارد کنید...">
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
                                        <option {{ $i == $industrialExpenditureResearch->year ? 'selected' : '' }} value="{{ $i }}">
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
                                        <option {{ $i == $industrialExpenditureResearch->month ? 'selected' : '' }} value="{{ $i }}">
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
