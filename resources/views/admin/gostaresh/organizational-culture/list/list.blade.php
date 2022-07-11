@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('organizational-culture.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
@endsection

@section('styles-head')
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
                                <th>میزان رضایت دانشجویان و فارغ التحصیلان واحد از خدمات دانشگاه</th>
                                <th>قابلیت یادگیری سازمانی واحد</th>
                                <th>میزان پایبندی به فضایل اخلاقی و باورهای دینی در میان دانشجویان واحد دانشگاهی</th>
                                <th>میزان پایبندی به فرهنگ تحقیق مطالعه، تتبع و تحقیق در میان دانشجویان واحد</th>
                                <th>میزان پایبندی به فرهنگ عفاف و حجاب و سبک پوشش اسلامی در میان دانشجویان واحد</th>
                                <th>سطح فرهنگ مشارکت پذیری و کار گروهی در واحد</th>
                                <th>سطح خودباوری و تعلق سازمانی در میان اعضای هیات علمی و کارکنان واحد</th>
                                <th>میزان المان های فیزیکی و نمایه های بصری هویت دار در واحد دانشگاهی</th>
                                <th>درصد اساتید نمونه واحد دانشگاهی از کل اساتید نمونه دانشگاه آزاد اسلامی استان</th>
                                <th>درصد اساتید نمونه دانشگاه آزاد اسلامی استان از کل اساتید نمونه دانشگاه آزاد اسلامی</th>
                                <th>درصد دانشجویان نمونه واحد دانشگاهی از کل دانشجویان نمونه دانشگاه آزاد اسلامی استان</th>
                                <th>درصد دانشجویان نمونه دانشگاه آزاد اسلامی استان از کل دانشجویان نمونه دانشگاه آزاد اسلامی</th>
                                <th>میزان نفوذ برند دانشگاه آزاد اسلامی و هویت بصری آن در سطح شهرستان/استان</th>
                                <th>میزان سامانه سپاری و هوشمندسازی ساختار تشکیلاتی، فرایندها و نظام های مدیریت در واحد</th>
                                <th>برنامه محوری (وجود برنامه راهبردی-عملیاتی در سطح واحد/استان مبتنی بر طرح آمایش)</th>
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($organizationalCultures as $key => $organizationalCulture)
                                <tr>
                                    <th scope="row">{{ $organizationalCultures?->firstItem() + $key }}</th>
                                    <td>{{ $organizationalCulture?->province?->name . ' - ' . $organizationalCulture->county?->name }}
                                    <td>{{ $organizationalCulture?->unit}}</td>
                                    <td>
                                        @foreach (config('gostaresh.amount') as $key => $value)
                                            @if ($key == $organizationalCulture->student_satisfaction)
                                                {{$value}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach (config('gostaresh.amount') as $key => $value)
                                            @if ($key == $organizationalCulture->unique_organizational_learning_capability)
                                                {{$value}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach (config('gostaresh.amount') as $key => $value)
                                            @if ($key == $organizationalCulture->students_religious_beliefs)
                                                {{$value}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach (config('gostaresh.amount') as $key => $value)
                                            @if ($key == $organizationalCulture->student_study_research_culture)
                                                {{$value}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach (config('gostaresh.amount') as $key => $value)
                                            @if ($key == $organizationalCulture->hijab_culture_of_students)
                                                {{$value}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach (config('gostaresh.amount') as $key => $value)
                                            @if ($key == $organizationalCulture->culture_of_participation)
                                                {{$value}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach (config('gostaresh.amount') as $key => $value)
                                            @if ($key == $organizationalCulture->faculty_members_self_confidence)
                                                {{$value}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach (config('gostaresh.amount') as $key => $value)
                                            @if ($key == $organizationalCulture->amount_of_physical_elements)
                                                {{$value}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$organizationalCulture->percentage_of_sample_professors_in_unit}}</td>
                                    <td>{{$organizationalCulture->percentage_of_sample_professors_in_province}}</td>
                                    <td>{{$organizationalCulture->percentage_of_sample_students_in_unit}}</td>
                                    <td>{{$organizationalCulture->percentage_of_sample_students_in_province}}</td>
                                    <td>
                                        @foreach (config('gostaresh.amount') as $key => $value)
                                            @if ($key == $organizationalCulture->brand_influence_in_the_province)
                                                {{$value}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach (config('gostaresh.amount') as $key => $value)
                                            @if ($key == $organizationalCulture->level_of_intelligence)
                                                {{$value}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach (config('gostaresh.amount') as $key => $value)
                                            @if ($key == $organizationalCulture->axial_program)
                                                {{$value}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $organizationalCulture?->year }}</td>
                                    <td>

                                        <a href="{{ route('organizational-culture.edit', $organizationalCulture) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $organizationalCulture) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $organizationalCultures->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
