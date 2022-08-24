@extends('layouts.dashboard')

@section('title-tag')
      تعداد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان (۱)
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان (۱)
@endsection

@section('page-title')
    تعداد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان (۱)

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-UniversityCostsAnalysis")
    <span>
        <a href="{{ route('university-costs.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                @foreach ($universityCosts as $key => $universityCost)
                                    <tr>
                                        <th scope="row">{{ $universityCosts?->firstItem() + $key }}</th>
                                        <td>{{ $universityCost?->province?->name . ' - ' . $universityCost->county?->name }}

                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\UniversityCostsAnalysis::$numeric_fields))
                                        <td>{{ $universityCost?->{$key} }}</td>
                                    @else
                                        <td>{{ $universityCost->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach
                                <td>{{ $universityCost?->year }}</td>
                                <td>
@can("edit-any-UniversityCostsAnalysis")
                                 <a href="{{ route('university-costs.edit', $universityCost) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
 @endcan
@can("delete-any-UniversityCostsAnalysis")
                                    <form method="POST" action="{{ route('university-costs.destroy', $universityCost) }}" role="form">
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
                                excelLink="{{ route('university-costs.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('university-costs.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('university-costs.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $universityCosts->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-gostaresh.university-costs.line-chart-by-all-fields-year-component></x-gostaresh.university-costs.line-chart-by-all-fields-year-component>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
