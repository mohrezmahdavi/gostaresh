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
    <span>
        <a href="{{ route('organizational-culture.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
@endsection

@section('styles-head')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="{{ asset('assets/datepicker/mds.bs.datetimepicker.style.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/datepicker/mds.bs.datetimepicker.js') }}"></script>
@endsection

@section('content')
    @include('admin.partials.row-notifiy-col')

    <x-gostaresh.filter-table-list.filter-table-list-component :filterColumnsCheckBoxes="$filterColumnsCheckBoxes"
                                                               :yearSelectedList="$yearSelectedList"/>

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
                                @foreach($filterColumnsCheckBoxes as $key => $value)
                                    @if( filterCol($key) )
                                        <th>{{$value}}</th>
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
                                    @foreach( $filterColumnsCheckBoxes as $key => $value)
                                        @if( filterCol($key))
                                            @if( in_array($key , \App\Models\Index\OrganizationalCultureStatusAnalysis::$numeric_fields))
                                                <td>{{ number_format($organizationalCulture?->{$key}) }}</td>
                                            @elseif( in_array($key , \App\Models\Index\OrganizationalCultureStatusAnalysis::$amount_fields))
                                                <td>
                                                    @foreach ( config('gostaresh.amount') as $amountKey => $amountValue)
                                                        @if ( $amountKey == $organizationalCulture->{$key})
                                                            {{ $amountValue}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>{{ $organizationalCulture?->{$key} }}</td>
                                            @endif
                                        @endif
                                    @endforeach

                                    <td>{{ $organizationalCulture?->year }}</td>
                                    <td>

                                        <a href="{{ route('organizational-culture.edit', $organizationalCulture) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $organizationalCulture) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-end mt-3">
                            <x-exports.export-links 
                                excelLink="{{ route('organizational-culture.list.excel', request()->query->all()) }}"
                                pdfLink="{{ route('organizational-culture.list.pdf', request()->query->all()) }}"
                                printLink="{{ route('organizational-culture.list.print', request()->query->all()) }}"
                            />
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
