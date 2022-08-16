@extends('layouts.dashboard')

@section('title-tag')
ویرایش تحلیل وضعیت تعداد برنامه های درسی
@endsection

@section('breadcrumb-title')
ویرایش تحلیل وضعیت تعداد برنامه های درسی
@endsection

@section('page-title')
تحلیل وضعیت تعداد برنامه های درسی

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>

<span>
    <a href="{{ route('status.analysis.of.the.number.of.curricula.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                    <form class="form-horizontal" method="POST" action="{{ route('status.analysis.of.the.number.of.curricula.update', $stsAnalysisOfTheNumOfCurricula) }}" role="form">
                        @csrf
                        @method('PUT')
                        <select-province-component province_default="{{ $stsAnalysisOfTheNumOfCurricula->province_id ?? ''}}"
                            zone_default="{{ $stsAnalysisOfTheNumOfCurricula->county->zone ?? ''}}"
                            county_default="{{ $stsAnalysisOfTheNumOfCurricula->county_id ?? ''}}"
                            city_default="{{ $stsAnalysisOfTheNumOfCurricula->city_id ?? ''}}"
                            rural_district_default="{{ $stsAnalysisOfTheNumOfCurricula->rural_district_id ?? ''}}"
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
                                <input type="text" id="unit" name="unit"
                                    value="{{ $stsAnalysisOfTheNumOfCurricula->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_number_of_curricula">
                                <span>تعداد کل برنامه های درسی (رشته گرایش‌ها) </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_number_of_curricula" name="total_number_of_curricula"
                                    value="{{ $stsAnalysisOfTheNumOfCurricula->total_number_of_curricula }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_modified_curricula">
                                <span>تعداد برنامه‌های درسی بازنگری و اصلاح شده با رویکرد مهارت آموزی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_modified_curricula" name="number_of_modified_curricula"
                                    value="{{ $stsAnalysisOfTheNumOfCurricula->number_of_modified_curricula }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="new_interdisciplinary_curricula_implemented">
                                <span>برنامه های درسی جدید میان رشته ای مورد اجرا </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="new_interdisciplinary_curricula_implemented" name="new_interdisciplinary_curricula_implemented"
                                    value="{{ $stsAnalysisOfTheNumOfCurricula->new_interdisciplinary_curricula_implemented }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="complete_new_interdisciplinary_curricula">
                                <span>کل برنامه‌های درسی جدید میان رشته‌ای مورد اجرا </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="complete_new_interdisciplinary_curricula" name="complete_new_interdisciplinary_curricula"
                                    value="{{ $stsAnalysisOfTheNumOfCurricula->complete_new_interdisciplinary_curricula }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_common_curricula_with_the_world">
                                <span>تعداد برنامه‌های درسی مشترک اجرا شده با سایر دانشگاه‌های جهان </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_common_curricula_with_the_world" name="number_of_common_curricula_with_the_world"
                                    value="{{ $stsAnalysisOfTheNumOfCurricula->number_of_common_curricula_with_the_world }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_curricula_developed">
                                <span>تعداد برنامه درسی تدوین شده جهت تاسیس رشته جدید تحصیلی توسط واحد دانشگاهی مورد نظر </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_curricula_developed" name="number_of_curricula_developed"
                                    value="{{ $stsAnalysisOfTheNumOfCurricula->number_of_curricula_developed }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$stsAnalysisOfTheNumOfCurricula->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$stsAnalysisOfTheNumOfCurricula->month" :required="false" name="month"></x-select-month> --}}


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
