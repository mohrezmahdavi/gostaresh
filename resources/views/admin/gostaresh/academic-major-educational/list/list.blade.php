@extends('layouts.dashboard')

@section('title-tag')
    نرخ پوشش تحصیلی بر حسب گروه عمده تحصیلی
@endsection

@section('breadcrumb-title')
    نرخ پوشش تحصیلی بر حسب گروه عمده تحصیلی
@endsection

@section('page-title')
    نرخ پوشش تحصیلی بر حسب گروه عمده تحصیلی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can("create-any-AcademicMajorEducational")
        <span>
        <a href="{{ route('academic.major.educational.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                @include('admin.gostaresh.academic-major-educational.list.partials.thead')
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($academicMajorEducationals as $key => $academicMajorEducational)
                                <tr>
                                    <th scope="row">{{ $academicMajorEducationals?->firstItem() + $key }}</th>

                                    @include('admin.gostaresh.academic-major-educational.list.partials.tbody')
                                    <td>

                                        @can("edit-any-AcademicMajorEducational")
                                            <a href="{{ route('academic.major.educational.edit', $academicMajorEducational) }}"
                                               title="{{ __('validation.buttons.edit') }}"
                                               class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can("delete-any-AcademicMajorEducational")
                                            <form method="POST"
                                                  action="{{ route('academic.major.educational.destroy', $academicMajorEducational) }}"
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
                                excelLink="{{ route('academic.major.educational.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('academic.major.educational.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('academic.major.educational.list.print', request()->query->all()) }}"/>
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $academicMajorEducationals->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-gostaresh.academic-major-educational.line-chart-all-fields-by-year-component/>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
