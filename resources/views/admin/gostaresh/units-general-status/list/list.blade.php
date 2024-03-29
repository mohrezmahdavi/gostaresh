@extends('layouts.dashboard')

@section('title-tag')
    تعداد وضعیت کلی واحدھا و مراکز آموزشی شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد وضعیت کلی واحدھا و مراکز آموزشی شھرستان ھای استان
@endsection

@section('page-title')
    تعداد وضعیت کلی واحدھا و مراکز آموزشی شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-UnitsGeneralStatus")
    <span>
        <a href="{{ route('units-general-status.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
 @endcan

@endsection

@section('styles-head')
    <!-- Apex js-->
    <script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>

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
                                    <th>درجه/رتبه</th>
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
                                @foreach ($unitsGeneralStatuses as $key => $unitsGeneralStatus)
                                    <tr>
                                        <th scope="row">{{ $unitsGeneralStatuses?->firstItem() + $key }}</th>
                                        <td>
                                            @foreach(config('gostaresh.rank') as $item => $value)
                                                @if($item == $unitsGeneralStatus['degree/rank'])
                                                    {{$value}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $unitsGeneralStatus?->province?->name . ' - ' . $unitsGeneralStatus->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\UnitsGeneralStatus::$numeric_fields))
                                                        <td>{{ $unitsGeneralStatus?->{$key} }}</td>
                                                    @else
                                                        <td>{{ $unitsGeneralStatus->{$key} }}</td>
                                                    @endif
                                                @endif
                                            @endforeach

                                <td>{{ $unitsGeneralStatus?->year }}</td>
                                <td>
@can("edit-any-UnitsGeneralStatus")
                                 <a href="{{ route('units-general-status.edit', $unitsGeneralStatus) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
 @endcan
@can("delete-any-UnitsGeneralStatus")
                                    <form method="POST" action="{{ route('units-general-status.destroy', $unitsGeneralStatus) }}" role="form">
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
                                excelLink="{{ route('units-general-status.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('units-general-status.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('units-general-status.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $unitsGeneralStatuses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.units-general-status.pie-chart-degree-and-rank-component></x-gostaresh.units-general-status.pie-chart-degree-and-rank-component>
        </div>

    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
