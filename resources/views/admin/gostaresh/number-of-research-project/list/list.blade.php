@extends('layouts.dashboard')

@section('title-tag')
    روند تغییرات تعداد کل طرح های پژوهشی
@endsection

@section('breadcrumb-title')
    روند تغییرات تعداد کل طرح های پژوهشی
@endsection

@section('page-title')
    روند تغییرات تعداد کل طرح های پژوهشی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-NumberOfResearchProject")
    <span>
        <a href="{{ route('number.of.research.project.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
 @endcan

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
                                    @include('admin.gostaresh.number-of-research-project.list.partials.thead')
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($numberOfResearchProjects as $key => $numberOfResearchProject)
                                    <tr>
                                        <th scope="row">{{ $numberOfResearchProjects?->firstItem() + $key }}</th>

                                        @include('admin.gostaresh.number-of-research-project.list.partials.tbody')

                                        <td>

@can("edit-any-NumberOfResearchProject")
                                            <a href="{{ route('number.of.research.project.edit', $numberOfResearchProject) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                   @endcan

@can("delete-any-NumberOfResearchProject")
                                    <form method="POST" action="{{ route('number.of.research.project.destroy', $numberOfResearchProject) }}" role="form">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button  type="submit" class="btn btn-danger btn-sm" title="{{ __('validation.buttons.delete') }}">
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
                                excelLink="{{ route('number.of.research.project.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('number.of.research.project.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('number.of.research.project.list.print', request()->query->all()) }}" />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $numberOfResearchProjects->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
