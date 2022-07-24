{{--Table 35 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت برونداد پژوھشی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت برونداد پژوھشی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت برونداد پژوھشی در واحدھای مستقر در شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('research-output-status-analyses.create') }}"
           class="btn btn-success btn-sm">افزودن رکورد جدید</a>
    </span>
@endsection

@section('styles-head')

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
                                    @if( filterCol($key))
                                        <th>{{$value}}</th>
                                    @endif
                                @endforeach
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($researchOutputStatusAnalyses as $key => $researchOutputStatusAnalysis)
                                <tr>
                                    <th scope="row">{{ $researchOutputStatusAnalyses?->firstItem() + $key }}</th>
                                    <td>{{ $researchOutputStatusAnalysis?->province?->name . ' - ' . $researchOutputStatusAnalysis->county?->name }}
                                    @foreach( $filterColumnsCheckBoxes as $key => $value)
                                        @if( filterCol($key))
                                            @if( in_array($key , \App\Models\Index\ResearchOutputStatusAnalysis::$numeric_fields))
                                                <td>{{ number_format($researchOutputStatusAnalysis?->{$key}) }}</td>
                                            @else
                                                <td>{{ $researchOutputStatusAnalysis?->{$key} }}</td>
                                            @endif
                                        @endif
                                    @endforeach
                                    <td>{{ $researchOutputStatusAnalysis?->year }}</td>
                                    <td>

                                        <a href="{{ route('research-output-status-analyses.edit', $researchOutputStatusAnalysis) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $researchOutputStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $researchOutputStatusAnalyses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
