@extends('layouts.dashboard')

@section('title-tag')
    تعداد انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال
@endsection

@section('breadcrumb-title')
    تعداد انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال
@endsection

@section('page-title')
    تعداد انتقال فناوری و نوآوری در عرصه بین المللی در دوره 10 سال

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-InternationalTechnology")
    <span>
        <a href="{{ route('international-technology.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                @foreach ($internationalTechnologies as $key => $internationalTechnology)
                                    <tr>
                                        <th scope="row">{{ $internationalTechnologies?->firstItem() + $key }}</th>
                                        <td>{{ $internationalTechnology?->province?->name . ' - ' . $internationalTechnology->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\InternationalTechnology::$numeric_fields))
                                        <td>{{ $internationalTechnology?->{$key} }}</td>
                                    @else
                                        <td>{{ $internationalTechnology?->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach

                                <td>{{ $internationalTechnology?->year }}</td>
                                <td>
@can("edit-any-InternationalTechnology")
                                 <a href="{{ route('international-technology.edit', $internationalTechnology) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
 @endcan
@can("delete-any-InternationalTechnology")
                                    <form method="POST" action="{{ route('international-technology.destroy', $internationalTechnology) }}" role="form">
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
                                excelLink="{{ route('international-technology.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('international-technology.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('international-technology.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $internationalTechnologies->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <x-gostaresh.international-technology.line-chart-by-all-fields-year-component></x-gostaresh.international-technology.line-chart-by-all-fields-year-component>
        </div>
    </div>

@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
