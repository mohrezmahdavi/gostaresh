@extends('layouts.dashboard')

@section('title-tag')
تعدادرشته/گرایشهای تحصیلی غیر پزشکی	
@endsection

@section('breadcrumb-title')
تعدادرشته/گرایشهای تحصیلی غیر پزشکی	
@endsection

@section('page-title')
تعدادرشته/گرایشهای تحصیلی غیر پزشکی	
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
                                    <th>شهرستان </th>
                                    <th>کاردانی پیوسته</th>
                                    <th>کاردانی ناپیوسته</th>
                                    <th>کارشناسی پیوسته</th>
                                    <th>کارشناسی ناپیوسته</th>
                                    <th>کارشناسی ارشد</th>
                                    <th>دکتری حرفه ای</th>
                                    <th>دکتری تخصصی</th>
                                    <th>گروه/ مقطع</th>

                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($numberOfNonMedicalFieldsOfStudies as $key => $numberOfNonMedicalFieldsOfStudy)
                                    <tr>
                                        <th scope="row">{{ $numberOfNonMedicalFieldsOfStudies?->firstItem() + $key }}</th>
        
                                        <td>{{ $numberOfNonMedicalFieldsOfStudy?->province?->name . ' - ' . $numberOfNonMedicalFieldsOfStudy->county?->name }}
                                        </td>
                                        <td>{{ $numberOfNonMedicalFieldsOfStudy?->kardani_peyvaste_count }}</td>
                                        <td>{{ $numberOfNonMedicalFieldsOfStudy?->kardani_na_peyvaste_count }}</td>
                                        <td>{{ $numberOfNonMedicalFieldsOfStudy?->karshenasi_peyvaste_count }}</td>
                                        <td>{{ $numberOfNonMedicalFieldsOfStudy?->karshenasi_na_peyvaste_count }}</td>
                                        <td>{{ $numberOfNonMedicalFieldsOfStudy?->karshenasi_arshad_count }}</td>
                                        <td>{{ $numberOfNonMedicalFieldsOfStudy?->docktora_herfei_count }}</td>
                                        <td>{{ $numberOfNonMedicalFieldsOfStudy?->docktora_takhasosi_count }}</td>
                                        <td>{{ $numberOfNonMedicalFieldsOfStudy?->department_of_education_title }}</td>
                                        <td>{{ $numberOfNonMedicalFieldsOfStudy?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('number.of.non.medical.fields.of.study.edit', $numberOfNonMedicalFieldsOfStudy) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('number.of.non.medical.fields.of.study.destroy', $numberOfNonMedicalFieldsOfStudy) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfNonMedicalFieldsOfStudies->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
