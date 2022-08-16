{{-- Table 35 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت برونداد پژوھشی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل وضعیت برونداد پژوھشی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('page-title')
    ویرایش تحلیل وضعیت برونداد پژوھشی در واحدھای مستقر در شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>

    <span>
        <a href="{{ route('research-output-status-analyses.index') }}" class="btn btn-secondary btn-sm">بازگشت به لیست اطلاعات</a>
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
                        action="{{ route('research-output-status-analyses.update', $researchOutputStatusAnalysis) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $researchOutputStatusAnalysis->province_id ?? ''}}"
                            zone_default="{{ $researchOutputStatusAnalysis->county->zone ?? ''}}"
                            county_default="{{ $researchOutputStatusAnalysis->county_id ?? ''}}"
                            city_default="{{ $researchOutputStatusAnalysis->city_id ?? ''}}"
                            rural_district_default="{{ $researchOutputStatusAnalysis->rural_district_id ?? ''}}"
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
                                    value="{{ $researchOutputStatusAnalysis->unit }}" class="form-control"
                                    placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_valid_scientific_articles">
                                <span>تعداد مقالات معتبر علمی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_valid_scientific_articles"
                                    name="number_of_valid_scientific_articles"
                                    value="{{ $researchOutputStatusAnalysis->number_of_valid_scientific_articles }}"
                                    class="form-control" placeholder=" تعداد مقالات معتبر علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_valid_books">
                                <span>تعداد کتب معتبر </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_valid_books" name="number_of_valid_books"
                                    value="{{ $researchOutputStatusAnalysis->number_of_valid_books }}" class="form-control"
                                    placeholder=" تعداد کتب معتبر را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_authored_books">
                                <span>تعداد کتب تالیفی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_authored_books" name="number_of_authored_books"
                                    value="{{ $researchOutputStatusAnalysis->number_of_authored_books }}"
                                    class="form-control" placeholder=" تعداد کتب تالیفی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_internal_inventions">
                                <span>تعداد اختراعات ثبت شده داخلی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_internal_inventions"
                                    name="number_of_internal_inventions"
                                    value="{{ $researchOutputStatusAnalysis->number_of_internal_inventions }}"
                                    class="form-control" placeholder=" تعداد اختراعات ثبت شده داخلی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_international_inventions">
                                <span>تعداد اختراعات ثبت شده بین المللی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_international_inventions"
                                    name="number_of_international_inventions"
                                    value="{{ $researchOutputStatusAnalysis->number_of_international_inventions }}"
                                    class="form-control" placeholder=" تعداد اختراعات ثبت شده بین المللی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_theses">
                                <span>تعداد پایان نامه ها </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_theses" name="number_of_theses"
                                    value="{{ $researchOutputStatusAnalysis->number_of_theses }}" class="form-control"
                                    placeholder=" تعداد پایان نامه ها را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_research_dissertations">
                                <span>تعداد پایان نامه های منجر به مقاله علمی-پژوهشی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_research_dissertations"
                                    name="number_of_research_dissertations"
                                    value="{{ $researchOutputStatusAnalysis->number_of_research_dissertations }}"
                                    class="form-control"
                                    placeholder=" تعداد پایان نامه های منجر به مقاله علمی-پژوهشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_compiled_dissertations">
                                <span>تعداد پایان نامه های تدوین شده بر اساس نظام موضوعات برنامه های علمی دانشگاه
                                </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_compiled_dissertations"
                                    name="number_of_compiled_dissertations"
                                    value="{{ $researchOutputStatusAnalysis->number_of_compiled_dissertations }}"
                                    class="form-control"
                                    placeholder=" تعداد پایان نامه های تدوین شده بر اساس نظام موضوعات برنامه های علمی دانشگاه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_invented_dissertations">
                                <span>تعداد پایان نامه های منجر به ثبت اختراع </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_invented_dissertations"
                                    name="number_of_invented_dissertations"
                                    value="{{ $researchOutputStatusAnalysis->number_of_invented_dissertations }}"
                                    class="form-control"
                                    placeholder=" تعداد پایان نامه های منجر به ثبت اختراع را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_product_dissertations">
                                <span>تعداد پایان نامه های منجر به محصول </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_product_dissertations"
                                    name="number_of_product_dissertations"
                                    value="{{ $researchOutputStatusAnalysis->number_of_product_dissertations }}"
                                    class="form-control"
                                    placeholder=" تعداد پایان نامه های منجر به محصول را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_completed_research_projects">
                                <span>تعداد طرح های تحقیقاتی خاتمه یافته </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_completed_research_projects"
                                    name="number_of_completed_research_projects"
                                    value="{{ $researchOutputStatusAnalysis->number_of_completed_research_projects }}"
                                    class="form-control"
                                    placeholder=" تعداد طرح های تحقیقاتی خاتمه یافته را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_theorizing_chairs">
                                <span>تعداد کرسی های نظریه پردازی برگزار شده توسط اساتید واحد دانشگاهی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_theorizing_chairs" name="number_of_theorizing_chairs"
                                    value="{{ $researchOutputStatusAnalysis->number_of_theorizing_chairs }}"
                                    class="form-control"
                                    placeholder=" تعداد کرسی های نظریه پردازی برگزار شده توسط اساتید واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_memoranda_of_understanding">
                                <span>تعداد تفاهمنامه ها با صنایع و سازمان‌های محلی/ملی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_memoranda_of_understanding"
                                    name="number_of_memoranda_of_understanding"
                                    value="{{ $researchOutputStatusAnalysis->number_of_memoranda_of_understanding }}"
                                    class="form-control"
                                    placeholder=" تعداد تفاهمنامه ها با صنایع و سازمان‌های محلی/ملی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount_of_national_contracts_concluded">
                                <span>مبلغ قراردهای منعقد شده با صنایع و سازمان‌های ملی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount_of_national_contracts_concluded"
                                    name="amount_of_national_contracts_concluded"
                                    value="{{ $researchOutputStatusAnalysis->amount_of_national_contracts_concluded }}"
                                    class="form-control"
                                    placeholder=" مبلغ قراردهای منعقد شده با صنایع و سازمان‌های ملی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount_of_local_contracts_concluded">
                                <span>مبلغ قراردهای منعقد شده با صنایع و سازمان‌های محلی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="amount_of_local_contracts_concluded"
                                    name="amount_of_local_contracts_concluded"
                                    value="{{ $researchOutputStatusAnalysis->amount_of_local_contracts_concluded }}"
                                    class="form-control"
                                    placeholder=" مبلغ قراردهای منعقد شده با صنایع و سازمان‌های محلی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_scientific_journals">
                                <span>تعداد مجلات علمی </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_scientific_journals"
                                    name="number_of_scientific_journals"
                                    value="{{ $researchOutputStatusAnalysis->number_of_scientific_journals }}"
                                    class="form-control" placeholder=" تعداد مجلات علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_R&D_research">
                                <span>تعداد پژوهش های معطوف به R &D </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_R&D_research" name="number_of_R&D_research"
                                    value="{{ $researchOutputStatusAnalysis['number_of_R&D_research'] }}"
                                    class="form-control" placeholder=" تعداد پژوهش های معطوف به R &D را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="number_of_innovative_ideas">
                                <span>تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده </span>&nbsp
                                {{--<span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>--}}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="number_of_innovative_ideas" name="number_of_innovative_ideas"
                                    value="{{ $researchOutputStatusAnalysis->number_of_innovative_ideas }}"
                                    class="form-control"
                                    placeholder=" تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده را وارد کنید...">
                            </div>
                        </div>

                        <x-select-year :default="$researchOutputStatusAnalysis->year" min="{{ config('gostaresh.year.min', 1370) }}" max="{{ config('gostaresh.year.max', 1405) }}" :required="false" name="year"></x-select-year>

                        {{-- <x-select-month :default="$researchOutputStatusAnalysis->month" :required="false" name="month"></x-select-month> --}}



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
