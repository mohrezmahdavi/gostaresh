{{--Table 36,37 View--}}
@extends('layouts.dashboard')

@section('title-tag')
    تعداد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('breadcrumb-title')
    تعداد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان
@endsection

@section('page-title')
    تعداد تحلیل وضعیت پژوھش بین المللی در واحدھای مستقر در شھرستان ھای استان

    <span>
        <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm">بازگشت به منو</a>
    </span>
    <span>
        <a href="{{ route('international-research.create') }}" class="btn btn-success btn-sm">افزودن رکورد جدید</a>
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
                                    @if( filterCol($key))
                                        <th>{{$value}}</th>
                                    @endif
                                @endforeach
                                <th>سال</th>
                                <th>اقدام</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: right; direction: ltr">
                            @foreach ($internationalResearchStatusAnalyses as $key => $internationalResearchStatusAnalysis)
                                <tr>
                                    <th scope="row">{{ $internationalResearchStatusAnalyses?->firstItem() + $key }}</th>
                                    <td>{{ $internationalResearchStatusAnalysis?->province?->name . ' - ' . $internationalResearchStatusAnalysis->county?->name }}
                                    @foreach( $filterColumnsCheckBoxes as $key => $value)
                                        @if( filterCol($key))
                                            @if( in_array($key , \App\Models\Index\InternationalResearchStatusAnalysis::$numeric_fields))
                                                <td>{{ number_format($internationalResearchStatusAnalysis?->{$key}) }}</td>
                                            @else
                                                <td>{{ $internationalResearchStatusAnalysis?->{$key} }}</td>
                                            @endif
                                        @endif
                                    @endforeach
                                    <td>{{ $internationalResearchStatusAnalysis?->year }}</td>
                                    <td>

                                        <a href="{{ route('international-research.edit', $internationalResearchStatusAnalysis) }}"
                                           title="{{ __('validation.buttons.edit') }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        {{--                                        <a href="{{ route('research-output-status-analyses.destroy', $internationalResearchStatusAnalysis) }}" title="{{ __('validation.buttons.delete') }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>--}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- end table-responsive-->
                    <div class="mt-3">
                        {{ $internationalResearchStatusAnalyses->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
