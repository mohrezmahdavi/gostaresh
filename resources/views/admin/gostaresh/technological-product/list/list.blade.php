@extends('layouts.dashboard')

@section('title-tag')
    تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال
@endsection

@section('breadcrumb-title')
    تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال
@endsection

@section('page-title')
    تعداد و محصولات فناورانه و نوآورانه اساتید و دانشجویان در دوره 10 سال

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('technological-product.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                @foreach ($technologicalProducts as $key => $technologicalProduct)
                                    <tr>
                                        <th scope="row">{{ $technologicalProducts?->firstItem() + $key }}</th>
                                        <td>{{ $technologicalProduct?->province?->name . ' - ' . $technologicalProduct->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\TechnologicalProduct::$numeric_fields))
                                        <td>{{ $technologicalProduct?->{$key} }}</td>
                                    @else
                                        <td>{{ $technologicalProduct?->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach
                                <td>{{ $technologicalProduct?->year }}</td>
                                <td>

                                    <a href="{{ route('technological-product.edit', $technologicalProduct) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>

                                    <form method="POST" action="{{ route('technological-product.destroy', $technologicalProduct) }}" role="form">
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
                                excelLink="{{ route('technological-product.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('technological-product.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('technological-product.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $technologicalProducts->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
