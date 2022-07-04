{{--Table 52,53 View--}}
@extends('layouts.dashboard')

@section('title-tag')
ایجاد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
ایجاد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('page-title')
ایجاد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان

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
                    <form class="form-horizontal" method="POST" action="{{ route('university-costs.store') }}" role="form">
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
                            <label class="col-sm-2 col-form-label" for="payment_to_faculty_members">
                                <span>درصد کل پرداختی به اعضای هیات علمی تمام وقت واحد دانشگاهی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="payment_to_faculty_members" name="payment_to_faculty_members"
                                       value="{{ old('payment_to_faculty_members') }}" class="form-control"
                                       placeholder=" درصد کل پرداختی به اعضای هیات علمی تمام وقت واحد دانشگاهی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="total_running_costs">
                                <span>کل هزینه های جاری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="total_running_costs" name="total_running_costs"
                                       value="{{ old('total_running_costs') }}" class="form-control"
                                       placeholder=" کل هزینه های جاری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_salary_of_faculty_members">
                                <span>میانگین حقوق دریافتی اعضای هیات علمی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_salary_of_faculty_members" name="average_salary_of_faculty_members"
                                       value="{{ old('average_salary_of_faculty_members') }}" class="form-control"
                                       placeholder=" میانگین حقوق دریافتی اعضای هیات علمی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_salaries_of_faculty_members_from_research_contracts">
                                <span>میانگین حقوق دریافتی اعضای هیات علمی دانشگاه آزاد اسلامی استان از محل قراردهای تحقیقاتی، آموزشی و خدماتی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_salaries_of_faculty_members_from_research_contracts" name="average_salaries_of_faculty_members_from_research_contracts"
                                       value="{{ old('average_salaries_of_faculty_members_from_research_contracts') }}" class="form-control"
                                       placeholder=" میانگین حقوق دریافتی اعضای هیات علمی دانشگاه آزاد اسلامی استان از محل قراردهای تحقیقاتی، آموزشی و خدماتی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="student_fees">
                                <span>هزینه دانشجویان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="student_fees" name="student_fees"
                                       value="{{ old('student_fees') }}" class="form-control"
                                       placeholder=" هزینه دانشجویان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="average_salary_of_employees">
                                <span>میانگین حقوق دریافتی کارمندان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="average_salary_of_employees" name="average_salary_of_employees"
                                       value="{{ old('average_salary_of_employees') }}" class="form-control"
                                       placeholder=" میانگین حقوق دریافتی کارمندان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="current_expenditure_growth_rate">
                                <span>نرخ رشد هزینه های جاری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="current_expenditure_growth_rate" name="current_expenditure_growth_rate"
                                       value="{{ old('current_expenditure_growth_rate') }}" class="form-control"
                                       placeholder=" نرخ رشد هزینه های جاری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cost_of_paying_office_rent">
                                <span>هزینه پرداخت اجاره ساختمان اداری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="cost_of_paying_office_rent" name="cost_of_paying_office_rent"
                                       value="{{ old('cost_of_paying_office_rent') }}" class="form-control"
                                       placeholder=" هزینه پرداخت اجاره ساختمان اداری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cost_of_rent_for_educational_building">
                                <span>هزینه پرداخت اجاره ساختمان آموزشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="cost_of_rent_for_educational_building" name="cost_of_rent_for_educational_building"
                                       value="{{ old('cost_of_rent_for_educational_building') }}" class="form-control"
                                       placeholder=" هزینه پرداخت اجاره ساختمان آموزشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cost_of_rent_for_research_building">
                                <span>هزینه پرداخت اجاره ساختمان پژوهشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="cost_of_rent_for_research_building" name="cost_of_rent_for_research_building"
                                       value="{{ old('cost_of_rent_for_research_building') }}" class="form-control"
                                       placeholder=" هزینه پرداخت اجاره ساختمان پژوهشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="extra_charge_for_rent_extracurricular_building">
                                <span>هزینه پرداخت اجاره ساختمان فوق برنامه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="extra_charge_for_rent_extracurricular_building" name="extra_charge_for_rent_extracurricular_building"
                                       value="{{ old('extra_charge_for_rent_extracurricular_building') }}" class="form-control"
                                       placeholder=" هزینه پرداخت اجاره ساختمان فوق برنامه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cost_of_rent_innovation_buildings">
                                <span>هزینه پرداخت اجاره ساختمان فناوری و نوآوری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="cost_of_rent_innovation_buildings" name="cost_of_rent_innovation_buildings"
                                       value="{{ old('cost_of_rent_innovation_buildings') }}" class="form-control"
                                       placeholder=" هزینه پرداخت اجاره ساختمان فناوری و نوآوری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="energy_costs_of_buildings">
                                <span>هزینه های انرژی ساختمان ها </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="energy_costs_of_buildings" name="energy_costs_of_buildings"
                                       value="{{ old('energy_costs_of_buildings') }}" class="form-control"
                                       placeholder=" هزینه های انرژی ساختمان ها را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cost_of_university_equipment">
                                <span>هزینه های نگهداری، استهلاک و تعمیرات دارایی ها و تجهیزات دانشگاه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="cost_of_university_equipment" name="cost_of_university_equipment"
                                       value="{{ old('cost_of_university_equipment') }}" class="form-control"
                                       placeholder=" هزینه های نگهداری، استهلاک و تعمیرات دارایی ها و تجهیزات دانشگاه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="training_costs">
                                <span>هزینه های حوزه آموزش </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="training_costs" name="training_costs"
                                       value="{{ old('training_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه آموزش را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="research_costs">
                                <span>هزینه های حوزه پژوهش </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="research_costs" name="research_costs"
                                       value="{{ old('research_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه پژوهش را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="innovation_costs">
                                <span>هزینه های حوزه فناوری و نوآوری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="innovation_costs" name="innovation_costs"
                                       value="{{ old('innovation_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه فناوری و نوآوری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="educational_costs">
                                <span>هزینه های حوزه مهارت آموزشی و کارآفرینی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="educational_costs" name="educational_costs"
                                       value="{{ old('educational_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه مهارت آموزشی و کارآفرینی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="development_costs">
                                <span>هزینه های حوزه تحقیق و توسعه </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="development_costs" name="development_costs"
                                       value="{{ old('development_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه تحقیق و توسعه را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="cultural_sphere_costs">
                                <span>هزینه های حوزه فرهنگی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="cultural_sphere_costs" name="cultural_sphere_costs"
                                       value="{{ old('cultural_sphere_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه فرهنگی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="administrative_costs">
                                <span>هزینه های حوزه اداری </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="administrative_costs" name="administrative_costs"
                                       value="{{ old('administrative_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه اداری را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="information_technology_costs">
                                <span>هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="information_technology_costs" name="information_technology_costs"
                                       value="{{ old('information_technology_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="International_sphere_costs">
                                <span>هزینه های حوزه بین الملل </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="International_sphere_costs" name="International_sphere_costs"
                                       value="{{ old('International_sphere_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه بین الملل را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="costs_of_staff_training_and_faculty">
                                <span>هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="costs_of_staff_training_and_faculty" name="costs_of_staff_training_and_faculty"
                                       value="{{ old('costs_of_staff_training_and_faculty') }}" class="form-control"
                                       placeholder=" هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="sports_expenses">
                                <span>هزینه های حوزه ورزشی </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="sports_expenses" name="sports_expenses"
                                       value="{{ old('sports_expenses') }}" class="form-control"
                                       placeholder=" هزینه های حوزه ورزشی را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="health_costs">
                                <span>هزینه های حوزه بهداشت و سلامت </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="health_costs" name="health_costs"
                                       value="{{ old('health_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه بهداشت و سلامت را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="entrepreneurship_costs">
                                <span>هزینه های حوزه ترویج کارآفرینی و اشتغال </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="entrepreneurship_costs" name="entrepreneurship_costs"
                                       value="{{ old('entrepreneurship_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه ترویج کارآفرینی و اشتغال را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="graduate_costs">
                                <span>هزینه های حوزه فارغ التحصیلان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="graduate_costs" name="graduate_costs"
                                       value="{{ old('graduate_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه فارغ التحصیلان را وارد کنید...">
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label" for="branding_costs">
                                <span>هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان </span>&nbsp
                                <span class="text-danger" style="font-size: 11px !important"> (اجباری) </span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" id="branding_costs" name="branding_costs"
                                       value="{{ old('branding_costs') }}" class="form-control"
                                       placeholder=" هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان را وارد کنید...">
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
