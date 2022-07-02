@extends('layouts.dashboard')

@section('title-tag')
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('styles-head')
    تعداد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                            <tr>
                                <th>#</th>
                                <th>شهرستان</th>
                                <th>واحد</th>
                                <th>درصد کل پرداختی به اعضای هیات علمی تمام وقت واحد دانشگاهی</th>
                                <th>کل هزینه های جاری</th>
                                <th>میانگین حقوق دریافتی اعضای هیات علمی</th>
                                <th>میانگین حقوق دریافتی اعضای هیات علمی دانشگاه آزاد اسلامی استان از محل قراردهای تحقیقاتی، آموزشی و خدماتی</th>
                                <th>هزینه دانشجویان</th>
                                <th>میانگین حقوق دریافتی کارمندان</th>
                                <th>نرخ رشد هزینه های جاری</th>
                                <th>هزینه پرداخت اجاره ساختمان اداری</th>
                                <th>هزینه پرداخت اجاره ساختمان آموزشی</th>
                                <th>هزینه پرداخت اجاره ساختمان پژوهشی</th>
                                <th>هزینه پرداخت اجاره ساختمان فوق برنامه</th>
                                <th>هزینه پرداخت اجاره ساختمان فناوری و نوآوری</th>
                                <th>هزینه های انرژی ساختمان ها</th>
                                <th>هزینه های نگهداری، استهلاک و تعمیرات دارایی ها و تجهیزات دانشگاه</th>
                                <th>هزینه های حوزه آموزش</th>
                                <th>هزینه های حوزه پژوهش</th>
                                <th>هزینه های حوزه فناوری و نوآوری</th>
                                <th>هزینه های حوزه مهارت آموزشی و کارآفرینی</th>
                                <th>هزینه های حوزه تحقیق و توسعه</th>
                                <th>هزینه های حوزه فرهنگی</th>
                                <th>هزینه های حوزه اداری</th>
                                <th>هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی</th>
                                <th>هزینه های حوزه بین الملل</th>
                                <th>هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید</th>
                                <th>هزینه های حوزه ورزشی</th>
                                <th>هزینه های حوزه بهداشت و سلامت</th>
                                <th>هزینه های حوزه ترویج کارآفرینی و اشتغال</th>
                                <th>هزینه های حوزه فارغ التحصیلان</th>
                                <th>هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($universityCosts as $key => $universityCost)
                                <tr>
                                    <th scope="row">{{ $universityCosts?->firstItem() + $key }}</th>
                                    <td>{{ $universityCost?->province?->name . ' - ' . $universityCost->county?->name }}
                                    <td>{{ $universityCost?->unit}}</td>
                                    <td>{{ $universityCost?->payment_to_faculty_members}}</td>
                                    <td>{{ $universityCost?->total_running_costs}}</td>
                                    <td>{{ $universityCost?->average_salary_of_faculty_members}}</td>
                                    <td>{{ $universityCost?->average_salaries_of_faculty_members_from_research_contracts}}</td>
                                    <td>{{ $universityCost?->student_fees}}</td>
                                    <td>{{ $universityCost?->average_salary_of_employees}}</td>
                                    <td>{{ $universityCost?->current_expenditure_growth_rate}}</td>
                                    <td>{{ $universityCost?->cost_of_paying_office_rent}}</td>
                                    <td>{{ $universityCost?->cost_of_rent_for_educational_building}}</td>
                                    <td>{{ $universityCost?->cost_of_rent_for_research_building}}</td>
                                    <td>{{ $universityCost?->extra_charge_for_rent_extracurricular_building}}</td>
                                    <td>{{ $universityCost?->cost_of_rent_innovation_buildings}}</td>
                                    <td>{{ $universityCost?->energy_costs_of_buildings}}</td>
                                    <td>{{ $universityCost?->cost_of_university_equipment}}</td>
                                    <td>{{ $universityCost?->training_costs}}</td>
                                    <td>{{ $universityCost?->research_costs}}</td>
                                    <td>{{ $universityCost?->innovation_costs}}</td>
                                    <td>{{ $universityCost?->educational_costs}}</td>
                                    <td>{{ $universityCost?->development_costs}}</td>
                                    <td>{{ $universityCost?->cultural_sphere_costs}}</td>
                                    <td>{{ $universityCost?->administrative_costs}}</td>
                                    <td>{{ $universityCost?->information_technology_costs}}</td>
                                    <td>{{ $universityCost?->International_sphere_costs}}</td>
                                    <td>{{ $universityCost?->costs_of_staff_training_and_faculty}}</td>
                                    <td>{{ $universityCost?->sports_expenses}}</td>
                                    <td>{{ $universityCost?->health_costs}}</td>
                                    <td>{{ $universityCost?->entrepreneurship_costs}}</td>
                                    <td>{{ $universityCost?->graduate_costs}}</td>
                                    <td>{{ $universityCost?->branding_costs}}</td>
                                    <td>{{ $universityCost?->year }}</td>
                                    <td>

                                        <a href="{{ route('university-costs.edit', $universityCost) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $universityCost) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $universityCosts->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
