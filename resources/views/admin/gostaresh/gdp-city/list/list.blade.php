@extends('layouts.dashboard')

@section('title-tag')
 روند تغییرات سهم تولید ناخالص داخلی شهرستان در مقایسه با تولید ناخالص داخلی
@endsection

@section('breadcrumb-title')
روند تغییرات سهم تولید ناخالص داخلی شهرستان در مقایسه با تولید ناخالص داخلی
@endsection

@section('page-title')
روند تغییرات سهم تولید ناخالص داخلی شهرستان در مقایسه با تولید ناخالص داخلی

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-GDPCity")
    <span>
        <a href="{{ route('gdp.city.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    @include('admin.gostaresh.gdp-city.list.partials.thead')
                                    <th>اقدام</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                                @foreach ($gdpCities as $key => $gdpCity)
                                    <tr>
                                        <th scope="row">{{ $gdpCities?->firstItem() + $key }}</th>

                                        @include('admin.gostaresh.gdp-city.list.partials.tbody')

                                        <td>

@can("edit-any-GDPCity")
                                            <a href="{{ route('gdp.city.edit', $gdpCity) }}"
                                                title="{{ __('validation.buttons.edit') }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                   @endcan

@can("delete-any-GDPCity")
                                    <form method="POST" action="{{ route('gdp.city.destroy', $gdpCity) }}" role="form">
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
                            <x-exports.export-links excelLink="{{ route('gdp.city.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('gdp.city.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('gdp.city.list.print', request()->query->all()) }}" />
                        </div>
                    </div> <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $gdpCities->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
