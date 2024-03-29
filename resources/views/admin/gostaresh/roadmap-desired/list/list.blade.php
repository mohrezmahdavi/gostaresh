@extends('layouts.dashboard')

@section('title-tag')
    ایجاد نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی
@endsection

@section('breadcrumb-title')
    ایجاد نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی
@endsection

@section('page-title')
    ایجاد نقشه راه دستیابی به وضع مطلوب در واحد دانشگاھی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-RoadmapToAchieveDesiredSituation")
    <span>
        <a href="{{ route('roadmap-desired.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    <th>شهرستان</th>
                                    @foreach ($filterColumnsCheckBoxes as $key => $value)
                                        @if (filterCol($key))
                                            <th>{{ $value }}</th>
                                        @endif
                                    @endforeach
                                    <th>سال</th>
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($roadmapDesireds as $key => $roadmapDesired)
                                    <tr>
                                        <th scope="row">{{ $roadmapDesireds?->firstItem() + $key }}</th>
                                        <td>{{ $roadmapDesired?->province?->name . ' - ' . $roadmapDesired->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\RoadmapToAchieveDesiredSituation::$numeric_fields))
                                        <td>{{ $roadmapDesired?->{$key} }}</td>
                                    @else
                                        <td>{{ $roadmapDesired->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach
                                <td>{{ $roadmapDesired?->year }}</td>
                                <td>
@can("edit-any-RoadmapToAchieveDesiredSituation")
                                 <a href="{{ route('roadmap-desired.edit', $roadmapDesired) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
 @endcan
@can("delete-any-RoadmapToAchieveDesiredSituation")
                                    <form method="POST" action="{{ route('roadmap-desired.destroy', $roadmapDesired) }}" role="form">
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
                                excelLink="{{ route('roadmap-desired.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('roadmap-desired.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('roadmap-desired.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $roadmapDesireds->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.roadmap-desired.line-chart-by-all-fields-year-component></x-gostaresh.roadmap-desired.line-chart-by-all-fields-year-component>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
