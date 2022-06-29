@extends('layouts.dashboard')

@section('title-tag')
ویرایش تعداد دوره های تحصیلی بین المللی
@endsection

@section('breadcrumb-title')
ویرایش تعداد دوره های تحصیلی بین المللی
@endsection

@section('page-title')
ویرایش تعداد دوره های تحصیلی بین المللی
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
                    <form class="form-horizontal" method="POST" action="{{ route('status.analysis.of.the.number.of.course.update', $statusAnalysisOfTheNumberOfCourse) }}" role="form">
                        @csrf
                        <select-province-component></select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                    value="{{ $statusAnalysisOfTheNumberOfCourse->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>


                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_number_of_courses">
                                <span>تعداد کل دوره های تحصیلی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="total_number_of_courses" name="total_number_of_courses"
                                    value="{{ $statusAnalysisOfTheNumberOfCourse->total_number_of_courses }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_Persian_language_courses_in_person">
                                <span>تعداد دوره های تحصیلی بین المللی زبان فارسی  حضوری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_Persian_language_courses_in_person" name="number_of_international_Persian_language_courses_in_person"
                                    value="{{ $statusAnalysisOfTheNumberOfCourse->number_of_international_Persian_language_courses_in_person }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_virtual_Persian_language_courses">
                                <span>داد دوره های تحصیلی بین المللی برگزار شده به زبان فارسی به صورت مجازی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_virtual_Persian_language_courses" name="number_of_international_virtual_Persian_language_courses"
                                    value="{{ $statusAnalysisOfTheNumberOfCourse->number_of_international_virtual_Persian_language_courses }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_courses_in_the_target_language_in_person">
                                <span>تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت حضوری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_courses_in_the_target_language_in_person" name="number_of_international_courses_in_the_target_language_in_person"
                                    value="{{ $statusAnalysisOfTheNumberOfCourse->number_of_international_courses_in_the_target_language_in_person }}" class="form-control"
                                    placeholder=" تعداد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_courses_in_the_target_language_virtually">
                                <span>تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت مجازی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" id="number_of_international_courses_in_the_target_language_virtually" name="number_of_international_courses_in_the_target_language_virtually"
                                    value="{{ $statusAnalysisOfTheNumberOfCourse->number_of_international_courses_in_the_target_language_virtually }}" class="form-control"
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
                                        <option {{ $i == $statusAnalysisOfTheNumberOfCourse->year ? 'selected' : '' }} value="{{ $i }}">
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
                                        <option {{ $i == $statusAnalysisOfTheNumberOfCourse->month ? 'selected' : '' }} value="{{ $i }}">
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
