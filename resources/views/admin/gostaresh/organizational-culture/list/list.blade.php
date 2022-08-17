@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت فرھنگ سازمانی در واحدھای شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
@can("create-any-OrganizationalCultureStatusAnalysis")
    <span>
        <a href="{{ route('organizational-culture.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                @foreach ($organizationalCultures as $key => $organizationalCulture)
                                    <tr>
                                        <th scope="row">{{ $organizationalCultures?->firstItem() + $key }}</th>
                                        <td>{{ $organizationalCulture?->province?->name . ' - ' . $organizationalCulture->county?->name }}
                                            @foreach ($filterColumnsCheckBoxes as $key => $value)
                                                @if (filterCol($key))
                                                    @if (in_array($key, \App\Models\Index\OrganizationalCultureStatusAnalysis::$numeric_fields))
                                        <td>{{ $organizationalCulture?->{$key} }}</td>
                                    @elseif(in_array($key, \App\Models\Index\OrganizationalCultureStatusAnalysis::$amount_fields))
                                        <td>
                                            {{$organizationalCulture->$key}}
                                        </td>
                                    @else
                                        <td>{{ $organizationalCulture?->{$key} }}</td>
                                @endif
                                @endif
                                @endforeach

                                <td>{{ $organizationalCulture?->year }}</td>
                                <td>
@can("edit-any-OrganizationalCultureStatusAnalysis")
                                 <a href="{{ route('organizational-culture.edit', $organizationalCulture) }}"
                                        title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
 @endcan
@can("delete-any-OrganizationalCultureStatusAnalysis")
                                    <form method="POST" action="{{ route('organizational-culture.destroy', $organizationalCulture) }}" role="form">
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
                                excelLink="{{ route('organizational-culture.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('organizational-culture.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('organizational-culture.list.print', request()->query->all()) }}" />
                        </div>
                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $organizationalCultures->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
