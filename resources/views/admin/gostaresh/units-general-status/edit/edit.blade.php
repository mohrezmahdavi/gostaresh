{{-- Table 57 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش وضعیت کلی واحدھا و مراکز آموزشی شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ویرایش وضعیت کلی واحدھا و مراکز آموزشی شھرستان ھای استان
@endsection

@section('page-title')
    ویرایش وضعیت کلی واحدھا و مراکز آموزشی شھرستان ھای استان

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
                        action="{{ route('units-general-status.update', $unitsGeneralStatus) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $unitsGeneralStatus->province_id }}"
                            zone_default="{{ $unitsGeneralStatus->county->zone }}"
                            county_default="{{ $unitsGeneralStatus->county_id }}"
                            city_default="{{ $unitsGeneralStatus->city_id }}"
                            rural_district_default="{{ $unitsGeneralStatus->rural_district_id }}"
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
                                <input type="text" id="unit" name="unit" value="{{ $unitsGeneralStatus->unit }}"
                                    class="form-control" placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="degree/rank">
                                <span>درجه/رتبه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="degree/rank" name="degree/rank">
                                    <option label="انتخاب کنید"></option>
                                    @foreach (config('gostaresh.rank') as $key => $value)
                                        <option {{ ($unitsGeneralStatus['degree/rank'] == $key) ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="score">
                                <span>امتیاز </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="score" name="score"
                                    value="{{ $unitsGeneralStatus->score }}" class="form-control"
                                    placeholder="امتیاز را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$unitsGeneralStatus->established_year" :required="true" name="established_year" title="سال تاسیس">
                        </x-select-year>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="approved_number_and_titles_of_the_faculty">
                                <span>تعداد و عناوین دانشکده مصوب </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="approved_number_and_titles_of_the_faculty"
                                    name="approved_number_and_titles_of_the_faculty"
                                    value="{{ $unitsGeneralStatus->approved_number_and_titles_of_the_faculty }}"
                                    class="form-control" placeholder=" تعداد و عناوین دانشکده مصوب را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$unitsGeneralStatus->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year">
                        </x-select-year>

                        {{-- <x-select-month :default="$unitsGeneralStatus->month" :required="false" name="month"></x-select-month> --}}



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
