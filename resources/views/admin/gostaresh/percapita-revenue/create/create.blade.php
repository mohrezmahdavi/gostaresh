{{-- Table 51 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ایجاد تحلیل وضعیت درآمد سرانه (مقطع-رشته-گرایش-محل) شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ایجاد تحلیل وضعیت درآمد سرانه (مقطع-رشته-گرایش-محل) شھرستان ھای استان
@endsection

@section('page-title')
    ایجاد تحلیل وضعیت درآمد سرانه (مقطع-رشته-گرایش-محل) شھرستان ھای استان

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
                    <form class="form-horizontal" method="POST" action="{{ route('percapita-revenue.store') }}"
                        role="form">
                        @csrf

                        <select-province-component province_default="{{ auth()->user()->province_id ?? '' }}"
                            zone_default="{{ auth()->user()->county->zone ?? '' }}"
                            county_default="{{ auth()->user()->county_id ?? '' }}"
                            city_default="{{ auth()->user()->city_id ?? '' }}"
                            rural_district_default="{{ auth()->user()->rural_district_id ?? '' }}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>

                        <select-grade-component></select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit" value="{{ old('unit') }}"
                                    class="form-control" placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="university_type">
                                <span>دانشگاه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="university_type" id="university_type" class="form-select">
                                    @foreach (config('gostaresh.university_type') as $key => $value)
                                        <option {{ $key == old('university_type') ? 'selected' : '' }}
                                            value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="grade_id">
                                <span>مقطع تحصیلی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="grade_id" id="grade_id" class="form-select">
                                    @foreach (\App\Models\Grade::all() as $grade)
                                        <option {{ $grade->id == old('grade') ? 'selected' : '' }}
                                            value="{{  $grade->id }}">{{  $grade->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="major_id">
                                <span>رشته </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="major_id" id="major_id" class="form-select">
                                    @foreach ($majors as $major)
                                        <option {{ $major->id == old('major') ? 'selected' : '' }}
                                            value="{{ $major->id }}">{{ $major->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="minor_id">
                                <span>گرایش </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="minor_id" id="minor_id" class="form-select">
                                    @foreach ($minors as $minor)
                                        <option {{ $minor->id == old('minor') ? 'selected' : '' }}
                                            value="{{ $minor->id }}">{{ $minor->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percapita_revenue_status_analyses">
                                <span>تحلیل وضعیت درآمد سرانه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="percapita_revenue_status_analyses"
                                    name="percapita_revenue_status_analyses"
                                    value="{{ old('percapita_revenue_status_analyses') }}" class="form-control"
                                    placeholder=" تحلیل وضعیت درآمد سرانه را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="old('year')" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="old('month')" :required="false" name="month"></x-select-month> --}}



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
