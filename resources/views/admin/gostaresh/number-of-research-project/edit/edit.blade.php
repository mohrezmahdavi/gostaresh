@extends('layouts.dashboard')

@section('title-tag')
    ویرایش روند تغییرات تعداد کل طرح های پژوهشی
@endsection

@section('breadcrumb-title')
    ویرایش روند تغییرات تعداد کل طرح های پژوهشی
@endsection

@section('page-title')
    ویرایش روند تغییرات تعداد کل طرح های پژوهشی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('number.of.research.project.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('number.of.research.project.update', $numberOfResearchProject) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $numberOfResearchProject->province_id ?? ''}}"
                            zone_default="{{ $numberOfResearchProject->county->zone ?? ''}}"
                            county_default="{{ $numberOfResearchProject->county_id ?? ''}}"
                            city_default="{{ $numberOfResearchProject->city_id ?? ''}}"
                            rural_district_default="{{ $numberOfResearchProject->rural_district_id ?? ''}}"
                            :fields="{{ json_encode([
                                'province' => true,
                                'zone' => false,
                                'county' => true,
                                'city' => false,
                            ]) }}">
                        </select-province-component>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_research">
                                <span> تعداد پژوهش </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" style="direction: rtl" id="number_of_research"
                                    name="number_of_research" value="{{ $numberOfResearchProject->number_of_research }}"
                                    class="form-control" placeholder="تعداد پژوهش ها را وارد کنید...">
                            </div>
                        </div>


                        <x-select-year :default="$numberOfResearchProject->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year">
                        </x-select-year>

                        {{-- <x-select-month :default="$numberOfResearchProject->month" :required="false" name="month"></x-select-month> --}}


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
