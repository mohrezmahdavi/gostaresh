{{--Table 51 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت درآمد سرانھ مقطع-رشتھ-گرایش-محل x شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل وضعیت درآمد سرانھ مقطع-رشتھ-گرایش-محل x شھرستان ھای استان
@endsection

@section('page-title')
    ویرایش تحلیل وضعیت درآمد سرانھ مقطع-رشتھ-گرایش-محل x شھرستان ھای استان
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
                        action="{{ route('percapita-revenue.update', $percapitaRevenue) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $percapitaRevenue->province_id }}"
                            county_default="{{ $percapitaRevenue->county_id }}"
                            city_default="{{ $percapitaRevenue->city_id }}"
                            rural_district_default="{{ $percapitaRevenue->rural_district_id }}">
                        </select-province-component>

                        <select-grade-component
                                grade_default="{{ $percapitaRevenue->grade_id }}"
                                sub_grade_default="{{ $percapitaRevenue->sub_grade_id }}"
                                major_default="{{ $percapitaRevenue->major_id }}"
                                minor_default="{{ $percapitaRevenue->minor_id }}"
                        >
                        </select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{ $percapitaRevenue->unit }}" class="form-control"
                                       placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="university_type">
                                <span>دانشگاه  </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="university_type" id="university_type" class="form-select" >
                                    @foreach (config('gostaresh.university_type') as $key => $value)
                                        <option {{ ($key == $percapitaRevenue->university_type ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="grade">
                                <span>مقطع تحصیلی  </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="grade" id="grade" class="form-select" >
                                    @foreach (config('gostaresh.grade') as $key => $value)
                                        <option {{ ($key == $percapitaRevenue->grade ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
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
                                <input type="text" id="percapita_revenue_status_analyses" name="percapita_revenue_status_analyses"
                                       value="{{ $percapitaRevenue->percapita_revenue_status_analyses }}" class="form-control"
                                       placeholder=" تحلیل وضعیت درآمد سرانه را وارد کنید...">
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
                                        <option {{ $i == $percapitaRevenue->year ? 'selected' : '' }}
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
                                        <option {{ $i == $percapitaRevenue->month ? 'selected' : '' }}
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
