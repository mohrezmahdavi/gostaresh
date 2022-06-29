@extends('layouts.dashboard')

@section('title-tag')
ایجاد تحلیل وضعیت تعداد برنامه های درسی
@endsection

@section('breadcrumb-title')
ایجاد تحلیل وضعیت تعداد برنامه های درسی
@endsection

@section('page-title')
تحلیل وضعیت تعداد برنامه های درسی
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
                    <form class="form-horizontal" method="POST" action="{{ route('status.analysis.of.the.number.of.curricula.create') }}" role="form">
                        @csrf
                        <select-province-component></select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                    value="{{ old('unit') }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_number_of_curricula">
                                <span>تعداد کل برنامه های درسی (رشته گرایش ها) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="total_number_of_curricula" name="total_number_of_curricula"
                                    value="{{ old('total_number_of_curricula') }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_modified_curricula">
                                <span>تعداد برنامه های درسی بازنگری و اصلاح شده با رویکرد مهارت آموزی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_modified_curricula" name="number_of_modified_curricula"
                                    value="{{ old('number_of_modified_curricula') }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="new_interdisciplinary_curricula_implemented">
                                <span>برنامه های درسی جدید میان رشته ای مورد اجرا </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="new_interdisciplinary_curricula_implemented" name="new_interdisciplinary_curricula_implemented"
                                    value="{{ old('new_interdisciplinary_curricula_implemented') }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="complete_new_interdisciplinary_curricula">
                                <span>کل برنامه های درسی جدید میان رشته ای مورد اجرا </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="complete_new_interdisciplinary_curricula" name="complete_new_interdisciplinary_curricula"
                                    value="{{ old('complete_new_interdisciplinary_curricula') }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_common_curricula_with_the_world">
                                <span>تعداد برنامه های درسی مشترک اجرا شده با سایر دانشگاه های جهان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_common_curricula_with_the_world" name="number_of_common_curricula_with_the_world"
                                    value="{{ old('number_of_common_curricula_with_the_world') }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_curricula_developed">
                                <span>تعداد برنامه درسی تدوین شده جهت تاسیس رشته جدید تحصیلی توسط واحد دانشگاهی مورد نظر </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_curricula_developed" name="number_of_curricula_developed"
                                    value="{{ old('number_of_curricula_developed') }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
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
                                        <option {{ $i == old('year') ? 'selected' : '' }} value="{{ $i }}">
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
                                        <option {{ $i == old('month') ? 'selected' : '' }} value="{{ $i }}">
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
