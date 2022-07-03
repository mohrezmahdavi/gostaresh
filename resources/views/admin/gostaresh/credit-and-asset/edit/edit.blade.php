{{--Table 56 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل اعتبارات و دارایی ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل اعتبارات و دارایی ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('page-title')
    ویرایش تحلیل اعتبارات و دارایی ھای دانشگاه در واحدھای دانشگاھی استان
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
                        action="{{ route('credit-and-asset.update', $creditAndAsset) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $creditAndAsset->province_id }}"
                            county_default="{{ $creditAndAsset->county_id }}"
                            city_default="{{ $creditAndAsset->city_id }}"
                            rural_district_default="{{ $creditAndAsset->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{$creditAndAsset->unit }}" class="form-control"
                                       placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="administrative_credits">
                                <span>اعتبارات اداری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="administrative_credits" name="administrative_credits"
                                       value="{{$creditAndAsset->administrative_credits }}" class="form-control"
                                       placeholder=" اعتبارات اداری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="educational_credits">
                                <span>اعتبارات آموزشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="educational_credits" name="educational_credits"
                                       value="{{$creditAndAsset->educational_credits }}" class="form-control"
                                       placeholder=" اعتبارات آموزشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="research_credits">
                                <span>اعتبارات پژوهشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="research_credits" name="research_credits"
                                       value="{{$creditAndAsset->research_credits }}" class="form-control"
                                       placeholder=" اعتبارات پژوهشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cultural_credits">
                                <span>اعتبارات فرهنگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="cultural_credits" name="cultural_credits"
                                       value="{{$creditAndAsset->cultural_credits }}" class="form-control"
                                       placeholder=" اعتبارات فرهنگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="innovative_credits">
                                <span>اعتبارات فناورانه و نوآورانه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="innovative_credits" name="innovative_credits"
                                       value="{{$creditAndAsset->innovative_credits }}" class="form-control"
                                       placeholder=" اعتبارات فناورانه و نوآورانه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="skills_credits">
                                <span>اعتبارات حوزه مهارتی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="skills_credits" name="skills_credits"
                                       value="{{$creditAndAsset->skills_credits }}" class="form-control"
                                       placeholder=" اعتبارات حوزه مهارتی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_University_credits">
                                <span>کل اعتبارات دانشگاه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_University_credits" name="total_University_credits"
                                       value="{{$creditAndAsset->total_University_credits }}" class="form-control"
                                       placeholder=" کل اعتبارات دانشگاه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_university_assets">
                                <span>کل دارایی های دانشگاه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_university_assets" name="total_university_assets"
                                       value="{{$creditAndAsset->total_university_assets }}" class="form-control"
                                       placeholder=" کل دارایی های دانشگاه را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$creditAndAsset->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$creditAndAsset->month" :required="false" name="month"></x-select-month>
                        

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
