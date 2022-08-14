@extends('layouts.dashboard')

@section('title-tag')
    تحلیل وضعیت تعداد دانشجویان بر اساس مقطع
@endsection

@section('breadcrumb-title')
    تحلیل وضعیت تعداد دانشجویان بر اساس مقطع
@endsection

@section('page-title')
    تحلیل وضعیت تعداد دانشجویان بر اساس مقطع

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('number.of.students.status.by-grade.analysis.create') }}" class="btn btn-success btn-sm">افزودن رکورد
            جدید</a>
    </span>
@endsection

@section('styles-head')
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes" :yearSelectedList="$yearSelectedList" :fieldsProvinceSelect="[
        'province' => true,
        'zone' => false,
        'county' => true,
        'city' => false,
    ]" />

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">

                                <tr>
                                    <th>#</th>
                                    @include('admin.gostaresh.number-of-students-status-by-grade-analysis.list.partials.thead')

                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($numberOfStudentsStatusAnalyses as $key => $numberOfStudentsStatusAnalysis)
                                    <tr>
                                        <th scope="row">{{ $numberOfStudentsStatusAnalyses?->firstItem() + $key }}</th>

                                        @include('admin.gostaresh.number-of-students-status-by-grade-analysis.list.partials.tbody')

                                        <td>

                                            <a href="{{ route('number.of.students.status.by-grade.analysis.edit', $numberOfStudentsStatusAnalysis) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                       
                                            <form method="POST" action="{{ route('number.of.students.status.by-grade.analysis.destroy', $numberOfStudentsStatusAnalysis) }}" role="form">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button  type="submit" class="btn btn-danger btn-sm" title="{{ __('validation.buttons.delete') }}">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-end mt-3">
                            <x-exports.export-links
                                excelLink="{{ route('number.of.students.status.by-garde.analysis.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('number.of.students.status.by-garde.analysis.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('number.of.students.status.by-garde.analysis.list.print', request()->query->all()) }}" />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfStudentsStatusAnalyses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
