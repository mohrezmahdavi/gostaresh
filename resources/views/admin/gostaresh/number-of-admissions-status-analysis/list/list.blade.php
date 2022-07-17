@extends('layouts.dashboard')

@section('title-tag')
تعداد پذیرفته شدگان
@endsection

@section('breadcrumb-title')
تعداد پذیرفته شدگان
@endsection

@section('page-title')
تعداد پذیرفته شدگان

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('number.of.admissions.status.analysis.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    <th>شهرستان </th>
                                    <th>دانشگاه </th>
                                    <th>جنسیت</th>
                                    <th>گروه عمده تحصیلی</th>
                                    <th>مقدار</th>
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($numberOfAdmissionsStatusAnalysises as $key => $numberOfAdmissionsStatusAnalysis)
                                    <tr>
                                        <th scope="row">{{ $numberOfAdmissionsStatusAnalysises?->firstItem() + $key }}</th>
        
                                        <td>{{ $numberOfAdmissionsStatusAnalysis?->province?->name . ' - ' . $numberOfAdmissionsStatusAnalysis->county?->name }}
                                        </td>
                                        <td>{{ $numberOfAdmissionsStatusAnalysis?->university_type_title }}</td>
                                        <td>{{ $numberOfAdmissionsStatusAnalysis?->gender_title }}</td>
                                        <td>{{ $numberOfAdmissionsStatusAnalysis?->department_of_education_title }}</td>
                                        <td>{{ number_format($numberOfAdmissionsStatusAnalysis?->number_of_admissions) }}</td>
                                        <td>{{ $numberOfAdmissionsStatusAnalysis?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('number.of.admissions.status.analysis.edit', $numberOfAdmissionsStatusAnalysis) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('number.of.admissions.status.analysis.destroy', $numberOfAdmissionsStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfAdmissionsStatusAnalysises->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
