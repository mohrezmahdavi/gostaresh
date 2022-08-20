@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل اعتبارات و دارایی ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل اعتبارات و دارایی ھای دانشگاه در واحدھای دانشگاھی استان
@endsection

@section('page-title')
    تعداد تحلیل اعتبارات و دارایی ھای دانشگاه در واحدھای دانشگاھی استان
    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-CreditAndAssetAnalysis")
    <span>
        <a href="{{ route('credit-and-asset.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                @foreach ($creditAndAssets as $key => $creditAndAsset)
                                    <tr>
                                        <th scope="row">{{ $creditAndAssets?->firstItem() + $key }}</th>
                                        <td>{{ $creditAndAsset?->province?->name . ' - ' . $creditAndAsset->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\CreditAndAssetAnalysis::$numeric_fields))
                                        <td>{{ $creditAndAsset?->{$key} }}</td>
                                    @else
                                        <td>{{ $creditAndAsset->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach
                                <td>{{ $creditAndAsset?->year }}</td>
                                <td>
@can("edit-any-CreditAndAssetAnalysis")
                                 <a href="{{ route('credit-and-asset.edit', $creditAndAsset) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
 @endcan
@can("delete-any-CreditAndAssetAnalysis")
                                    <form method="POST" action="{{ route('credit-and-asset.destroy', $creditAndAsset) }}" role="form">
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
                                excelLink="{{ route('credit-and-asset.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('credit-and-asset.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('credit-and-asset.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $creditAndAssets->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
