{{-- Table 52,53 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ایجاد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
    ایجاد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('page-title')
    ایجاد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('university-costs-per-unit.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                    <form class="form-horizontal" method="POST" action="{{ route('university-costs-per-unit.store') }}" role="form">
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

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit" value="{{ old('unit') }}"
                                    class="form-control" placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="training_costs">
                                <span>هزینه های حوزه آموزش </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="training_costs" name="training_costs"
                                    value="{{ old('training_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه آموزش را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="research_costs">
                                <span>هزینه های حوزه پژوهش </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="research_costs" name="research_costs"
                                    value="{{ old('research_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه پژوهش را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="innovation_costs">
                                <span>هزینه های حوزه فناوری و نوآوری </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="innovation_costs" name="innovation_costs"
                                    value="{{ old('innovation_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه فناوری و نوآوری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="educational_costs">
                                <span>هزینه های حوزه مهارت آموزشی و کارآفرینی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="educational_costs" name="educational_costs"
                                    value="{{ old('educational_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه مهارت آموزشی و کارآفرینی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="development_costs">
                                <span>هزینه های حوزه تحقیق و توسعه </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="development_costs" name="development_costs"
                                    value="{{ old('development_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه تحقیق و توسعه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cultural_sphere_costs">
                                <span>هزینه های حوزه فرهنگی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="cultural_sphere_costs" name="cultural_sphere_costs"
                                    value="{{ old('cultural_sphere_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه فرهنگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="administrative_costs">
                                <span>هزینه های حوزه اداری </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="administrative_costs" name="administrative_costs"
                                    value="{{ old('administrative_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه اداری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="information_technology_costs">
                                <span>هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="information_technology_costs"
                                    name="information_technology_costs" value="{{ old('information_technology_costs') }}"
                                    class="form-control"
                                    placeholder=" هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="International_sphere_costs">
                                <span>هزینه های حوزه بین الملل </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="International_sphere_costs" name="International_sphere_costs"
                                    value="{{ old('International_sphere_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه بین الملل را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="costs_of_staff_training_and_faculty">
                                <span>هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="costs_of_staff_training_and_faculty"
                                    name="costs_of_staff_training_and_faculty"
                                    value="{{ old('costs_of_staff_training_and_faculty') }}" class="form-control"
                                    placeholder=" هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="sports_expenses">
                                <span>هزینه های حوزه ورزشی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="sports_expenses" name="sports_expenses"
                                    value="{{ old('sports_expenses') }}" class="form-control"
                                    placeholder=" هزینه های حوزه ورزشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="health_costs">
                                <span>هزینه های حوزه بهداشت و سلامت </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="health_costs" name="health_costs"
                                    value="{{ old('health_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه بهداشت و سلامت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="entrepreneurship_costs">
                                <span>هزینه های حوزه ترویج کارآفرینی و اشتغال </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="entrepreneurship_costs" name="entrepreneurship_costs"
                                    value="{{ old('entrepreneurship_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه ترویج کارآفرینی و اشتغال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="graduate_costs">
                                <span>هزینه های حوزه فارغ التحصیلان </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="graduate_costs" name="graduate_costs"
                                    value="{{ old('graduate_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه فارغ التحصیلان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="branding_costs">
                                <span>هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="branding_costs" name="branding_costs"
                                    value="{{ old('branding_costs') }}" class="form-control"
                                    placeholder=" هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="old('year')" min="1390" max="1400" :required="false" name="year"></x-select-year>

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
