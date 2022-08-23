{{-- Table 32 View --}}
@extends('layouts.dashboard')

@section('title-tag')
    تعداد کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به
    تفکیک مقطع و گروه عمده تحصیلی و جنسیت
@endsection

@section('breadcrumb-title')
    تعداد کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به
    تفکیک مقطع و گروه عمده تحصیلی و جنسیت
@endsection

@section('page-title')
    تعداد کل دانش آموختگان از مراکز آموزش عالی موجود در شھرستان محل استقرار واحد دانشگاھی (فارغ التحصیلان کل زیرنظام ھا) به
    تفکیک مقطع و گروه عمده تحصیلی و جنسیت

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can("create-any-GraduatesOfHigherEducationCenters")
        <span>
        <a href="{{ route('graduates-of-higher-education.create') }}"
           class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                            @foreach ($graduatesOfHigherEducationCenters as $key => $graduatesOfHigherEducationCenter)
                                <tr>
                                    <th scope="row">{{ $graduatesOfHigherEducationCenters?->firstItem() + $key }}
                                    </th>
                                    <td>{{ $graduatesOfHigherEducationCenter?->province?->name . ' - ' . $graduatesOfHigherEducationCenter->county?->name }}
                                    @foreach ($filterColumnsCheckBoxes as $key => $value)
                                        @if (in_array($key, \App\Models\Index\GraduatesOfHigherEducationCenters::$numeric_fields))
                                            <td>{{ $graduatesOfHigherEducationCenter?->{$key} }}</td>
                                        @else
                                            <td>{{ $graduatesOfHigherEducationCenter?->{$key} }}</td>
                                        @endif
                                    @endforeach

                                    <td>{{ $graduatesOfHigherEducationCenter?->year }}</td>
                                    <td>
                                        @can("edit-any-GraduatesOfHigherEducationCenters")
                                            <a href="{{ route('graduates-of-higher-education.edit', $graduatesOfHigherEducationCenter) }}"
                                               title="{{ __('validation.buttons.edit') }}"
                                               class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i></a>
                                        @endcan
                                        @can("delete-any-GraduatesOfHigherEducationCenters")
                                            <form method="POST"
                                                  action="{{ route('graduates-of-higher-education.destroy', $graduatesOfHigherEducationCenter) }}"
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
                                excelLink="{{ route('graduates.of.higher.education.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('graduates.of.higher.education.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('graduates.of.higher.education.list.print', request()->query->all()) }}"/>
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $graduatesOfHigherEducationCenters->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-gostaresh.graduates-of-higher-education-centers.line-chart-all-fields-by-year-component/>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
