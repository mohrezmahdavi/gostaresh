@extends('layouts.dashboard')

@section('title-tag')
    نرخ فقر شهرستان های استان
@endsection

@section('breadcrumb-title')
    نرخ فقر شهرستان های استان
@endsection

@section('page-title')
    نرخ فقر شهرستان های استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    @can('create-any-PovertyOfProvincialCity')
        <span>
            <a href="{{ route('poverty.of.provincial.city.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    @include('admin.gostaresh.poverty-of-provincial-citiy.list.partials.thead')
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($povertyOfProvincialCities as $key => $povertyOfProvincialCity)
                                    <tr>
                                        <th scope="row">{{ $povertyOfProvincialCities?->firstItem() + $key }}</th>

                                        @include('admin.gostaresh.poverty-of-provincial-citiy.list.partials.tbody')
                                        <td>

                                            @can('edit-any-PovertyOfProvincialCity')
                                                <a href="{{ route('poverty.of.provincial.city.edit', $povertyOfProvincialCity) }}"
                                                    title="{{ __('validation.buttons.edit') }}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan

                                            @can('delete-any-PovertyOfProvincialCity')
                                                <form method="POST"
                                                    action="{{ route('poverty.of.provincial.city.destroy', $povertyOfProvincialCity) }}"
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
                                excelLink="{{ route('poverty.of.provincial.city.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('poverty.of.provincial.city.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('poverty.of.provincial.city.list.print', request()->query->all()) }}" />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $povertyOfProvincialCities->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-gostaresh.poverty-of-provincial-city.line-chart-by-all-fields-year-component></x-gostaresh.poverty-of-provincial-city.line-chart-by-all-fields-year-component>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
