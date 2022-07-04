@extends('layouts.dashboard')

@section('title-tag')
    ویرایش  تعداد و ترکیب جمعیت دانش آموزی
@endsection

@section('breadcrumb-title')
ویرایش  تعداد و ترکیب جمعیت دانش آموزی
@endsection

@section('page-title')
ویرایش  تعداد و ترکیب جمعیت دانش آموزی
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
                    <form class="form-horizontal" method="POST" action="{{ route('number.student.population.update', $numberStudentPopulation) }}" role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component
                            province_default="{{ $numberStudentPopulation->province_id }}"
                            county_default="{{ $numberStudentPopulation->county_id }}"
                            city_default="{{ $numberStudentPopulation->city_id }}"
                            rural_district_default="{{ $numberStudentPopulation->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="gender_id">
                                <span>جنسیت  </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="gender_id" id="gender_id" class="form-select" >
                                    @foreach (config('gostaresh.gender') as $key => $value)
                                    <option {{ ($key == $numberStudentPopulation->gender_id ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        {{-- <select-grade-component
                            grade_default="{{ $numberStudentPopulation->grade_id }}"
                            sub_grade_default="{{ $numberStudentPopulation->sub_grade_id }}"
                            major_default="{{ $numberStudentPopulation->major_id }}"
                            minor_default="{{ $numberStudentPopulation->minor_id }}"
                        >
                        </select-grade-component> --}}

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="ebtedai">
                                <span> ابتدایی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="ebtedai" name="ebtedai" value="{{ $numberStudentPopulation->ebtedai }}"
                                    class="form-control" placeholder="تعداد ابتدایی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_1">
                                <span> متوسطه اول </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="motevasete_1" name="motevasete_1" value="{{ $numberStudentPopulation->motevasete_1 }}"
                                    class="form-control" placeholder="تعداد متوسطه اول را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_ensani">
                                <span> متوسطه دوم (علوم انسانی) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="motevasete_2_ensani" name="motevasete_2_ensani" value="{{ $numberStudentPopulation->motevasete_2_ensani }}"
                                    class="form-control" placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_math">
                                <span> متوسطه دوم (ریاضی) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="motevasete_2_math" name="motevasete_2_math" value="{{ $numberStudentPopulation->motevasete_2_math }}"
                                    class="form-control" placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_science">
                                <span> متوسطه دوم (علوم تجربی) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="motevasete_2_science" name="motevasete_2_science" value="{{ $numberStudentPopulation->motevasete_2_science }}"
                                    class="form-control" placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="motevasete_2_kar_danesh">
                                <span> متوسطه دوم (کار و دانش و فنی حرفه ای) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="motevasete_2_kar_danesh" name="motevasete_2_kar_danesh" value="{{ $numberStudentPopulation->motevasete_2_kar_danesh }}"
                                    class="form-control" placeholder="تعداد  را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$numberStudentPopulation->year" :required="false" name="year"></x-select-year>

                        <x-select-month :default="$numberStudentPopulation->month" :required="false" name="month"></x-select-month>
                        
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
