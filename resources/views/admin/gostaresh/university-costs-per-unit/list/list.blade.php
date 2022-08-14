@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان (۲)
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان (۲)
@endsection

@section('page-title')
    تعداد تحلیل وضعیت ھزینه ھای دانشگاه در واحدھای دانشگاھی استان (۲)

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('university-costs-per-unit.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                        <td>{{ number_format($universityCost?->{$key}) }}</td>
                                    @else
                                        <td>{{ $universityCost->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach
                                <td>{{ $universityCost?->year }}</td>
                                <td>

                                    <a href="{{ route('university-costs-per-unit.edit', $universityCost) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>

                                    <form method="POST" action="{{ route('university-costs-per-unit.destroy', $universityCost) }}" role="form">
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
                                excelLink="{{ route('university-costs-per-unit.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('university-costs-per-unit.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('university-costs-per-unit.list.print', request()->query->all()) }}" />
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
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
