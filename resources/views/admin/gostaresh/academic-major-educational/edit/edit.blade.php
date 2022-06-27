@extends('layouts.dashboard')

@section('title-tag')
    ویرایش نرخ پوشش تحصیلی
@endsection

@section('breadcrumb-title')
    ویرایش نرخ پوشش تحصیلی
@endsection

@section('page-title')
    ویرایش نرخ پوشش تحصیلی
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
                        action="{{ route('multiple.deprivation.index.of.city.update', $academicMajorEducational) }}" role="form">
                        @csrf
                        <select-province-component></select-province-component>
                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="department_of_education_percent">
                                <span> گروه تحصیلی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="department_of_education_percent" id="department_of_education_percent"
                                    class="form-select">
                                    @foreach (config('gostaresh.department_of_education') as $key => $value)
                                        <option {{ $key == $academicMajorEducational->department_of_education ? 'selected' : '' }} value="{{ $key }}">
                                            {{ $value }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="azad_eslami_count">
                                <span>دانشگاه آزاد اسلامی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="azad_eslami_count" name="azad_eslami_count"
                                    value="{{ $academicMajorEducational->azad_eslami_count }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="dolati_count">
                                <span>دانشگاه دولتی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="dolati_count" name="dolati_count"
                                    value="{{ $academicMajorEducational->dolati_count }}" class="form-control"
                                    placeholder=" دانشگاه آزاد اسلامی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="payam_noor_count">
                                <span>دانشگاه پیام نور </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="payam_noor_count" name="payam_noor_count"
                                    value="{{ $academicMajorEducational->payam_noor_count }}" class="form-control"
                                    placeholder=" دانشگاه پیام نور را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="gheir_entefai_count">
                                <span>دانشگاه غیر انتفاعی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="gheir_entefai_count" name="gheir_entefai_count"
                                    value="{{ $academicMajorEducational->gheir_entefai_count }}" class="form-control"
                                    placeholder=" دانشگاه غیر انتفاعی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="elmi_karbordi_count">
                                <span>دانشگاه علمی کاربردی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="elmi_karbordi_count" name="elmi_karbordi_count"
                                    value="{{ $academicMajorEducational->elmi_karbordi_count }}" class="form-control"
                                    placeholder=" دانشگاه علمی کاربردی را وارد کنید...">
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
                                        <option {{ $i == $academicMajorEducational->year ? 'selected' : '' }} value="{{ $i }}">
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
                                        <option {{ $i == $academicMajorEducational->month ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

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
