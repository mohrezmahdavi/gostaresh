@extends('layouts.dashboard')

@section('title-tag')
تحلیل وضعیت تعداد دانشجویان	
@endsection

@section('breadcrumb-title')
تحلیل وضعیت تعداد دانشجویان	
@endsection

@section('page-title')
تحلیل وضعیت تعداد دانشجویان	

<span>
    <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
</span>
<span>
    <a href="{{ route('number.of.students.status.analysis.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($numberOfStudentsStatusAnalysises as $key => $numberOfStudentsStatusAnalysis)
                                    <tr>
                                        <th scope="row">{{ $numberOfStudentsStatusAnalysises?->firstItem() + $key }}</th>
        
                                        <td>{{ $numberOfStudentsStatusAnalysis?->province?->name . ' - ' . $numberOfStudentsStatusAnalysis->county?->name }}
                                        </td>
                                        <td>{{ $numberOfStudentsStatusAnalysis?->university_type_title }}</td>
                                        <td>{{ $numberOfStudentsStatusAnalysis?->gender_title }}</td>
                                        <td>{{ $numberOfStudentsStatusAnalysis?->department_of_education_title }}</td>
                                        <td>{{ $numberOfStudentsStatusAnalysis?->number_of_students }}</td>
                                        <td>{{ $numberOfStudentsStatusAnalysis?->year }}</td>
                                        <td>
        
                                            <a href="{{ route('number.of.students.status.analysis.edit', $numberOfStudentsStatusAnalysis) }}"
                                                title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
        
                                            <a href="{{ route('number.of.students.status.analysis.destroy', $numberOfStudentsStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfStudentsStatusAnalysises->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
@endsection
