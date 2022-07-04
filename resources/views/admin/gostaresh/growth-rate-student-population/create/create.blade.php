@extends('layouts.dashboard')

@section('title-tag')
    افزودن  نرخ رشد و ترکیب جمعیت دانش آموزی
@endsection

@section('breadcrumb-title')
افزودن  نرخ رشد و ترکیب جمعیت دانش آموزی
@endsection

@section('page-title')
افزودن  نرخ رشد و ترکیب جمعیت دانش آموزی
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" id="app">
                    <form class="form-horizontal" method="POST" action="{{ route('number.student.population.store') }}" role="form">
                        @csrf

                        <select-province-component></select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="gender_id">
                                <span>جنسیت  </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="gender_id" id="gender_id" class="form-select" >
                                    @foreach (config('gostaresh.gender') as $key => $value)
                                    <option {{ ($key == old('gender_id') ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <select-grade-component></select-grade-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="ebtedai">
                                <span> ابتدایی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="ebtedai" name="ebtedai" value="{{ old('ebtedai') }}"
                                    class="form-control" placeholder="تعداد ابتدایی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_1">
                                <span> متوسطه اول </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="motevasete_1" name="motevasete_1" value="{{ old('motevasete_1') }}"
                                    class="form-control" placeholder="تعداد متوسطه اول را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_ensani">
                                <span> متوسطه دوم (علوم انسانی) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="motevasete_2_ensani" name="motevasete_2_ensani" value="{{ old('motevasete_2_ensani') }}"
                                    class="form-control" placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_math">
                                <span> متوسطه دوم (ریاضی) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="motevasete_2_math" name="motevasete_2_math" value="{{ old('motevasete_2_math') }}"
                                    class="form-control" placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_science">
                                <span> متوسطه دوم (علوم تجربی) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="motevasete_2_science" name="motevasete_2_science" value="{{ old('motevasete_2_science') }}"
                                    class="form-control" placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_kar_danesh">
                                <span> متوسطه دوم (کار و دانش و فنی حرفه ای) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="motevasete_2_kar_danesh" name="motevasete_2_kar_danesh" value="{{ old('motevasete_2_kar_danesh') }}"
                                    class="form-control" placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="old('year')" :required="false" name="year"></x-select-year>

                        <x-select-month :default="old('month')" :required="false" name="month"></x-select-month>

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
