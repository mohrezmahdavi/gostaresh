@extends('layouts.dashboard')

@section('title-tag')
    نرخ رشد سالانه ثبت نام دانشجو
@endsection

@section('breadcrumb-title')
    نرخ رشد سالانه ثبت نام دانشجو
@endsection

@section('page-title')
    نرخ رشد سالانه ثبت نام دانشجو

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can("create-any-AnnualGrowthRateOfStudentEnrollment")
        <span>
        <a href="{{ route('annual.growth.rate.of.student.enrollment.create')  }}" class="btn btn-success btn-sm">افزودن رکورد
            جدید</a>
    </span>
    @endcan
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes"
                                                               :yearSelectedList="$yearSelectedList"
                                                               :fieldsProvinceSelect="[
        'province' => true,
        'zone' => false,
        'county' => true,
        'city' => false,
    ]"/>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                            <tr>
                                <th>#</th>
                                @include('admin.gostaresh.annual-growth-rate-of-student-enrollment.list.partials.thead')

                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($annualGrowthRateOfStudentEnrollments as $key => $annualGrowthRateOfStudentEnrollment)
                                <tr>
                                    <th scope="row">{{ $annualGrowthRateOfStudentEnrollments?->firstItem() + $key }}
                                    </th>

                                    @include('admin.gostaresh.annual-growth-rate-of-student-enrollment.list.partials.tbody')


                                    <td>

                                        @can("edit-any-AnnualGrowthRateOfStudentEnrollment")
                                            <a href="{{ route('annual.growth.rate.of.student.enrollment.edit', $annualGrowthRateOfStudentEnrollment) }}"
                                               title="{{ __('validation.buttons.edit') }}"
                                               class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        @endcan


                                        @can("delete-any-AnnualGrowthRateOfStudentEnrollment")
                                            <form method="POST"
                                                  action="{{ route('annual.growth.rate.of.student.enrollment.destroy', $annualGrowthRateOfStudentEnrollment) }}"
                                                  role="form">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="{{ __('validation.buttons.delete') }}">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-end mt-3">
                            <x-exports.export-links
                                excelLink="{{ route('annual.growth.rate.of.student.enrollment.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('annual.growth.rate.of.student.enrollment.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('annual.growth.rate.of.student.enrollment.list.print', request()->query->all()) }}"/>
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $annualGrowthRateOfStudentEnrollments->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-gostaresh.annual-growth-rate-of-student-enrollment.line-chart-all-fields-by-year-component/>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
