{{-- Table 46 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت سرانه فضای دانشگاھی برای دانشجویان در واحدھای شھرستانی در استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل وضعیت سرانه فضای دانشگاھی برای دانشجویان در واحدھای شھرستانی در استان
@endsection

@section('page-title')
    ویرایش تحلیل وضعیت سرانه فضای دانشگاھی برای دانشجویان در واحدھای شھرستانی در استان

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
                    <form class="form-horizontal" method="POST"
                        action="{{ route('percapita-status-analyses.update', $percapitaStatusAnalysis) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $percapitaStatusAnalysis->province_id }}"
                            zone_default="{{ $percapitaStatusAnalysis->county->zone }}"
                            county_default="{{ $percapitaStatusAnalysis->county_id }}"
                            city_default="{{ $percapitaStatusAnalysis->city_id }}"
                            rural_district_default="{{ $percapitaStatusAnalysis->rural_district_id }}"
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
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                    value="{{ $percapitaStatusAnalysis->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percapita_office_space">
                                <span>سرانه فضای اداری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="percapita_office_space" name="percapita_office_space"
                                    value="{{ $percapitaStatusAnalysis->percapita_office_space }}" class="form-control"
                                    placeholder=" سرانه فضای اداری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percapita_educational_space">
                                <span>سرانه فضای آموزشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="percapita_educational_space" name="percapita_educational_space"
                                    value="{{ $percapitaStatusAnalysis->percapita_educational_space }}"
                                    class="form-control" placeholder=" سرانه فضای آموزشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percapita_innovation_space">
                                <span>سرانه فضای فناوری و نوآوری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="percapita_innovation_space" name="percapita_innovation_space"
                                    value="{{ $percapitaStatusAnalysis->percapita_innovation_space }}" class="form-control"
                                    placeholder=" سرانه فضای فناوری و نوآوری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percapita_cultural_space">
                                <span>سرانه فضای فرهنگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="percapita_cultural_space" name="percapita_cultural_space"
                                    value="{{ $percapitaStatusAnalysis->percapita_cultural_space }}" class="form-control"
                                    placeholder=" سرانه فضای فرهنگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percapita_civil_space">
                                <span>سرانه فضای عمرانی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="percapita_civil_space" name="percapita_civil_space"
                                    value="{{ $percapitaStatusAnalysis->percapita_civil_space }}" class="form-control"
                                    placeholder=" سرانه فضای عمرانی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="building_under_construction">
                                <span>ساختمان در دست احداث </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="building_under_construction" name="building_under_construction"
                                    value="{{ $percapitaStatusAnalysis->building_under_construction }}"
                                    class="form-control" placeholder=" ساختمان در دست احداث را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percapita_residential">
                                <span>سرانه اقامتی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="percapita_residential" name="percapita_residential"
                                    value="{{ $percapitaStatusAnalysis->percapita_residential }}" class="form-control"
                                    placeholder=" سرانه اقامتی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percapita_operating_buildings">
                                <span>سرانه ساختمان های بهره بردار </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="percapita_operating_buildings"
                                    name="percapita_operating_buildings"
                                    value="{{ $percapitaStatusAnalysis->percapita_operating_buildings }}"
                                    class="form-control" placeholder=" سرانه ساختمان های بهره بردار را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percapita_sports_space">
                                <span>سرانه فضای ورزشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="percapita_sports_space" name="percapita_sports_space"
                                    value="{{ $percapitaStatusAnalysis->percapita_sports_space }}" class="form-control"
                                    placeholder=" سرانه فضای ورزشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percapita_aristocratic_space">
                                <span>سرانه فضای اعیانی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="percapita_aristocratic_space"
                                    name="percapita_aristocratic_space"
                                    value="{{ $percapitaStatusAnalysis->percapita_aristocratic_space }}"
                                    class="form-control" placeholder=" سرانه فضای اعیانی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percapita_arena_space">
                                <span>سرانه فضای عرصه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="percapita_arena_space" name="percapita_arena_space"
                                    value="{{ $percapitaStatusAnalysis->percapita_arena_space }}" class="form-control"
                                    placeholder=" سرانه فضای عرصه را وارد کنید...">
                            </div>
                        </div>


                        <x-select-year :default="$percapitaStatusAnalysis->year" min="1390" max="1400" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$percapitaStatusAnalysis->month" :required="false" name="month"></x-select-month> --}}


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
