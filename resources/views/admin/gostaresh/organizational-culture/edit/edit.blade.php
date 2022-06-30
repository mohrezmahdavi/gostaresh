{{--Table 44 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    ویرایش تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    ویرایش تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    ویرایش تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان
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
                        action="{{ route('organizational-culture.update', $organizationalCulture) }}"
                        role="form">
                        @csrf
                        @method('PUT')

                        <select-province-component province_default="{{ $organizationalCulture->province_id }}"
                            county_default="{{ $organizationalCulture->county_id }}"
                            city_default="{{ $organizationalCulture->city_id }}"
                            rural_district_default="{{ $organizationalCulture->rural_district_id }}">
                        </select-province-component>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unit">
                                <span>واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="unit" name="unit"
                                       value="{{ $organizationalCulture->unit }}" class="form-control"
                                       placeholder=" واحد را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="student_satisfaction">
                                <span>میزان رضایت دانشجویان و فارغ التحصیلان واحد از خدمات دانشگاه  </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="student_satisfaction" id="student_satisfaction" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->student_satisfaction ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="unique_organizational_learning_capability">
                                <span>قابلیت یادگیری سازمانی واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="unique_organizational_learning_capability" id="unique_organizational_learning_capability" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->unique_organizational_learning_capability ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="students_religious_beliefs">
                                <span>میزان پایبندی به فضایل اخلاقی و باورهای دینی در میان دانشجویان واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="students_religious_beliefs" id="students_religious_beliefs" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->students_religious_beliefs ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="student_study_research_culture">
                                <span>میزان پایبندی به فرهنگ تحقیق مطالعه، تتبع و تحقیق در میان دانشجویان واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="student_study_research_culture" id="student_study_research_culture" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->student_study_research_culture ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="hijab_culture_of_students">
                                <span>میزان پایبندی به فرهنگ عفاف و حجاب و سبک پوشش اسلامی در میان دانشجویان واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="hijab_culture_of_students" id="hijab_culture_of_students" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->hijab_culture_of_students ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="culture_of_participation">
                                <span>سطح فرهنگ مشارکت پذیری و کار گروهی در واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="culture_of_participation" id="culture_of_participation" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->culture_of_participation ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="faculty_members_self_confidence">
                                <span>سطح خودباوری و تعلق سازمانی در میان اعضای هیات علمی و کارکنان واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="faculty_members_self_confidence" id="faculty_members_self_confidence" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->faculty_members_self_confidence ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="amount_of_physical_elements">
                                <span>میزان المان های فیزیکی و نمایه های بصری هویت دار در واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="amount_of_physical_elements" id="amount_of_physical_elements" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->amount_of_physical_elements ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_sample_professors_in_unit">
                                <span>درصد اساتید نمونه واحد دانشگاهی از کل اساتید نمونه دانشگاه آزاد اسلامی استان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="percentage_of_sample_professors_in_unit" id="percentage_of_sample_professors_in_unit" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->percentage_of_sample_professors_in_unit ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_sample_professors_in_province">
                                <span>درصد اساتید نمونه دانشگاه آزاد اسلامی استان از کل اساتید نمونه دانشگاه آزاد اسلامی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="percentage_of_sample_professors_in_province" id="percentage_of_sample_professors_in_province" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->percentage_of_sample_professors_in_province ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_sample_students_in_unit">
                                <span>درصد دانشجویان نمونه واحد دانشگاهی از کل دانشجویان نمونه دانشگاه آزاد اسلامی استان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="percentage_of_sample_students_in_unit" id="percentage_of_sample_students_in_unit" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->percentage_of_sample_students_in_unit ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="percentage_of_sample_students_in_province">
                                <span>درصد دانشجویان نمونه دانشگاه آزاد اسلامی استان از کل دانشجویان نمونه دانشگاه آزاد اسلامی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="percentage_of_sample_students_in_province" id="percentage_of_sample_students_in_province" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->percentage_of_sample_students_in_province ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="brand_influence_in_the_province">
                                <span>میزان نفوذ برند دانشگاه آزاد اسلامی و هویت بصری آن در سطح شهرستان/استان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="brand_influence_in_the_province" id="brand_influence_in_the_province" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->brand_influence_in_the_province ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="level_of_intelligence">
                                <span>میزان سامانه سپاری و هوشمندسازی ساختار تشکیلاتی، فرایندها و نظام های مدیریت در واحد </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="level_of_intelligence" id="level_of_intelligence" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->level_of_intelligence ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="axial_program">
                                <span>برنامه محوری (وجود برنامه راهبردی-عملیاتی در سطح واحد/استان مبتنی بر طرح آمایش) </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <select name="axial_program" id="axial_program" class="form-select" >
                                    @foreach (config('gostaresh.amount') as $key => $value)
                                        <option {{ ($key == $organizationalCulture->axial_program ? 'selected' : '') }} value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
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
                                        <option {{ $i == $organizationalCulture->year ? 'selected' : '' }}
                                            value="{{ $i }}">
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
                                        <option {{ $i == $organizationalCulture->month ? 'selected' : '' }}
                                            value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor

                                </select>

                            </div>
                        </div>

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
