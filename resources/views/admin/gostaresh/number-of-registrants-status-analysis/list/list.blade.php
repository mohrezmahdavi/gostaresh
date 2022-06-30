@extends('layouts.dashboard')

@section('title-tag')
تعداد  ثبت نام شدگان
@endsection

@section('breadcrumb-title')
تعداد  ثبت نام شدگان
@endsection

@section('page-title')
تعداد  ثبت نام شدگان
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
                                    <th>دانشگاه </th>
                                    <th>جنسیت</th>
                                    <th>گروه عمده تحصیلی</th>
                                    <th>مقدار</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($numberOfRegistrantsStatusAnalysises as $key => $numberOfRegistrantsStatusAnalysis)
                                    <tr>
                                        <th scope="row">{{ $numberOfRegistrantsStatusAnalysises?->firstItem() + $key }}</th>
        
                                        <td>{{ $numberOfRegistrantsStatusAnalysis?->province?->name . ' - ' . $numberOfRegistrantsStatusAnalysis->county?->name }}
                                        </td>
                                        <td>{{ $numberOfRegistrantsStatusAnalysis?->university_type_title }}</td>
                                        <td>{{ $numberOfRegistrantsStatusAnalysis?->gender_title }}</td>
                                        <td>{{ $numberOfRegistrantsStatusAnalysis?->department_of_education_title }}</td>
                                        <td>{{ $numberOfRegistrantsStatusAnalysis?->number_of_registrants }}</td>
                                        <td>{{ $numberOfRegistrantsStatusAnalysis?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('number.of.registrants.status.analysis.edit', $numberOfRegistrantsStatusAnalysis) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('number.of.registrants.status.analysis.destroy', $numberOfRegistrantsStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfRegistrantsStatusAnalysises->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
